# WP-REST
	https://www.sitepoint.com/creating-custom-endpoints-for-the-wordpress-rest-api/		
			
			
Routes & Endpoints	We’re using the register_rest_route() with the following parameters:		
			
	a namespace, mytwentyseventeentheme/v1		
	a resource path with a regex for catching the category ID, latest-posts/(?P<category_id>\d+)		
	an option array where we specify the GET method and a get_latest_posts_by_category() callback function that handles the request.		
			
	A namespace allows two plugins or themes to use the same route paths without conflict and the clients to detect the support for your custom API by simply using the /wp-json/wp/v2 API and checking the namespaces field.		
			
	http://localhost:81/myshop/wp-json/wp/v2/	all registed rest api routes	
	https://developer.wordpress.org/reference/functions/register_rest_route/		
	https://developer.wordpress.org/reference/functions/current_user_can/		
	REST Modularity	theme	active/deactive
		namespace	
		route	
		args	
	http://localhost:81/myshop/wp-json/mytwentyseventeentheme/v1/latest-posts/1		
	C:\xampp\htdocs\myshop\wp-content\themes\twentyseventeen-child		
