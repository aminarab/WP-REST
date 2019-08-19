<?php 


//http://localhost/wp-json/mytwentyseventeentheme/v1/latest-posts/<CATEGORY_ID>
add_action('rest_api_init', function () {
  register_rest_route( 'mytwentyseventeentheme/v1', 'latest-posts/(?P<category_id>\d+)',array(
                'methods'  => 'GET',
				'args' => [
					'category_id' => array(
						'validate_callback' => function($value, $request, $param) {
							return $value >= 6;
						}
						/*
						,
						'sanitize_callback' => function($value, $request, $param) {
							if($value < 6){
								return 6;
							}
						}
						*/
					)
				],
                'callback' => 'get_latest_posts_by_category',
				'permission_callback' => function() {
					return current_user_can('edit_posts');
				}
      ));
});

function get_latest_posts_by_category($request) {

    $args = array(
            'category' => $request['category_id']
    );

    $posts = get_posts($args);
    if (empty($posts)) {
    return new WP_Error( 'empty_category', 'there is no post in this category', array('status' => 404) );

    }

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}

?>