<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site";
$route['404_override'] = '';

/*
*	Site Routes
*/
$route['home'] = 'site/home_page';

/*
*	Settings Routes
*/
$route['settings'] = 'admin/settings';
$route['dashboard'] = 'admin/index';

/*
*	Login Routes
*/
$route['login-admin'] = 'login/login_admin';
$route['logout-admin'] = 'login/logout_admin';

/*
*	Users Routes
*/
$route['all-users'] = 'admin/users';
$route['all-users/(:num)'] = 'admin/users/index/$1';
$route['add-user'] = 'admin/users/add_user';
$route['edit-user/(:num)'] = 'admin/users/edit_user/$1';
$route['delete-user/(:num)'] = 'admin/users/delete_user/$1';
$route['activate-user/(:num)'] = 'admin/users/activate_user/$1';
$route['deactivate-user/(:num)'] = 'admin/users/deactivate_user/$1';
$route['reset-user-password/(:num)'] = 'admin/users/reset_password/$1';
$route['admin-profile/(:num)'] = 'admin/users/admin_profile/$1';


/*
*	Property Routes
*/
$route['property/all-properties'] = 'admin/property/properties';
$route['property/all-properties/(:num)'] = 'admin/property/properties/$1';
$route['property/add-property'] = 'admin/property/add_property';
$route['property/edit-property/(:num)'] = 'admin/property/edit_property/$1';
$route['property/delete-property/(:num)'] = 'admin/property/delete_property/$1';
$route['property/activate-property/(:num)'] = 'admin/property/activate_property/$1';
$route['property/deactivate-property/(:num)'] = 'admin/property/deactivate_property/$1';

/*
*	Property type Routes
*/

$route['property/all-property-type'] = 'admin/property/propert_types';
$route['property/all-property-type/(:num)'] = 'admin/property/propert_types/$1';
$route['property/add-property-type'] = 'admin/property/add_property_type';
$route['property/edit-property-type/(:num)'] = 'admin/property/edit_property_type/$1';
$route['property/delete-property-type/(:num)'] = 'admin/property/delete_property_type/$1';
$route['property/activate-property-type/(:num)'] = 'admin/property/activate_property_type/$1';
$route['property/deactivate-property-type/(:num)'] = 'admin/property/deactivate_property_type/$1';


/*
*	Property locations
*/

$route['property/all-location'] = 'admin/property/locations';
$route['property/all-location/(:num)'] = 'admin/property/locations/$1';
$route['property/add-location'] = 'admin/property/add_location';
$route['property/edit-location/(:num)'] = 'admin/property/edit_location/$1';
$route['property/activate-location/(:num)'] = 'admin/property/activate_location/$1';
$route['property/deactivate-location/(:num)'] = 'admin/property/deactivate_location/$1';
/*
*	Admin Routes
*/

//airlines
$route['administration/all-airlines'] = 'admin/airlines/index';
$route['administration/all-airlines/(:num)'] = 'admin/airlines/index/$1';//with a page number
$route['administration/add-airline'] = 'admin/airlines/add_airline';
$route['administration/edit-airline/(:num)'] = 'admin/airlines/edit_airline/$1';
$route['administration/activate-airline/(:num)/(:num)'] = 'admin/airlines/activate_airline/$1/$2';
$route['administration/deactivate-airline/(:num)/(:num)'] = 'admin/airlines/deactivate_airline/$1/$2';
$route['administration/delete-airline/(:num)/(:num)'] = 'admin/airlines/delete_airline/$1/$2';

//visitors
$route['administration/all-visitors'] = 'admin/visitors/index';
$route['administration/all-visitors/(:num)'] = 'admin/visitors/index/$1';//with a page number
$route['administration/add-visitor'] = 'admin/visitors/add_visitor';
$route['administration/edit-visitor/(:num)'] = 'admin/visitors/edit_visitor/$1';
$route['administration/activate-visitor/(:num)/(:num)'] = 'admin/visitors/activate_visitor/$1/$2';
$route['administration/deactivate-visitor/(:num)/(:num)'] = 'admin/visitors/deactivate_visitor/$1/$2';
$route['administration/delete-visitor/(:num)/(:num)'] = 'admin/visitors/delete_visitor/$1/$2';

//airplane types
$route['administration/all-airplane-types'] = 'admin/airplane_types/index';
$route['administration/all-airplane-types/(:num)'] = 'admin/airplane_types/index/$1';//with a page number
$route['administration/add-airplane-type'] = 'admin/airplane_types/add_airplane_type';
$route['administration/edit-airplane-type/(:num)'] = 'admin/airplane_types/edit_airplane_type/$1';
$route['administration/activate-airplane-type/(:num)/(:num)'] = 'admin/airplane_types/activate_airplane_type/$1/$2';
$route['administration/deactivate-airplane-type/(:num)/(:num)'] = 'admin/airplane_types/deactivate_airplane_type/$1/$2';
$route['administration/delete-airplane-type/(:num)/(:num)'] = 'admin/airplane_types/delete_airplane_type/$1/$2';

//airports
$route['administration/all-airports'] = 'admin/airports/index';
$route['administration/all-airports/(:num)'] = 'admin/airports/index/$1';//with a page number
$route['administration/add-airport'] = 'admin/airports/add_airport';
$route['administration/edit-airport/(:num)'] = 'admin/airports/edit_airport/$1';
$route['administration/activate-airport/(:num)/(:num)'] = 'admin/airports/activate_airport/$1/$2';
$route['administration/deactivate-airport/(:num)/(:num)'] = 'admin/airports/deactivate_airport/$1/$2';
$route['administration/delete-airport/(:num)/(:num)'] = 'admin/airports/delete_airport/$1/$2';

//flight types
$route['administration/all-flight-types'] = 'admin/flight_types/index';
$route['administration/all-flight-types/(:num)'] = 'admin/flight_types/index/$1';//with a page number
$route['administration/add-flight-type'] = 'admin/flight_types/add_flight_type';
$route['administration/edit-flight-type/(:num)'] = 'admin/flight_types/edit_flight_type/$1';
$route['administration/activate-flight-type/(:num)/(:num)'] = 'admin/flight_types/activate_flight_type/$1/$2';
$route['administration/deactivate-flight-type/(:num)/(:num)'] = 'admin/flight_types/deactivate_flight_type/$1/$2';
$route['administration/delete-flight-type/(:num)/(:num)'] = 'admin/flight_types/delete_flight_type/$1/$2';

//Vendor
$route['vendor/sign-up/personal-details'] = 'vendor/vendor_signup1';
$route['vendor/sign-up/store-details'] = 'vendor/vendor_signup2';
$route['vendor/sign-up/subscribe'] = 'vendor/vendor_signup3';
$route['vendor/sign-up/subscribe/free'] = 'vendor/subscribe/1';
$route['vendor/sign-up/subscribe/basic'] = 'vendor/subscribe/2';
$route['vendor/sign-up/subscribe/unlimited'] = 'vendor/subscribe/3';

/*
*	Admin Blog Routes
*/
$route['posts'] = 'admin/blog';
$route['all-posts'] = 'admin/blog';
$route['blog-categories'] = 'admin/blog/categories';
$route['add-post'] = 'admin/blog/add_post';
$route['edit-post/(:num)'] = 'admin/blog/edit_post/$1';
$route['delete-post/(:num)'] = 'admin/blog/delete_post/$1';
$route['activate-post/(:num)'] = 'admin/blog/activate_post/$1';
$route['deactivate-post/(:num)'] = 'admin/blog/deactivate_post/$1';
$route['post-comments/(:num)'] = 'admin/blog/post_comments/$1';
$route['comments/(:num)'] = 'admin/blog/comments/$1';
$route['comments'] = 'admin/blog/comments';
$route['add-comment/(:num)'] = 'admin/blog/add_comment/$1';
$route['delete-comment/(:num)/(:num)'] = 'admin/blog/delete_comment/$1/$2';
$route['activate-comment/(:num)/(:num)'] = 'admin/blog/activate_comment/$1/$2';
$route['deactivate-comment/(:num)/(:num)'] = 'admin/blog/deactivate_comment/$1/$2';
$route['add-blog-category'] = 'admin/blog/add_blog_category';
$route['edit-blog-category/(:num)'] = 'admin/blog/edit_blog_category/$1';
$route['delete-blog-category/(:num)'] = 'admin/blog/delete_blog_category/$1';
$route['activate-blog-category/(:num)'] = 'admin/blog/activate_blog_category/$1';
$route['deactivate-blog-category/(:num)'] = 'admin/blog/deactivate_blog_category/$1';
$route['delete-comment/(:num)'] = 'admin/blog/delete_comment/$1';
$route['activate-comment/(:num)'] = 'admin/blog/activate_comment/$1';
$route['deactivate-comment/(:num)'] = 'admin/blog/deactivate_comment/$1';

/*
*	Blog Routes
*/
$route['blog'] = 'blog';
$route['blog/(:num)'] = 'blog/index/$1';
$route['blog/(:num)/(:num)'] = 'blog/index/$1/$2';
$route['blog/post/(:num)'] = 'blog/view_post/$1';
$route['blog/category/(:num)'] = 'blog/index/$1';
$route['blog/category/(:num)/(:num)'] = 'blog/index/$1/$2';


/* End of file routes.php */
/* Location: ./application/config/routes.php */



$route['home'] = 'site/home_page';
$route['properties'] = 'site/property';
$route['properties/for-sale'] = 'site/property_onsale';
$route['properties/sold'] = 'site/property_sold';
$route['properties/(:num)'] = 'site/property/$1';
$route['properties/view-single/(:num)'] = 'site/property_detail/$1';
$route['request'] = 'site/contact';
$route['contact'] = 'site/contact';
$route['news'] = 'site/blog';
$route['news/view-single/(:num)'] = 'site/blog_detail/$1';
$route['about'] = 'site/about';
$route['service/(:num)'] = 'site/service/$1';
$route['search-properties'] = 'site/search_properties';
$route['close-search'] = 'site/close_property_search';
$route['request-news-letter'] = 'site/request_newsletter';
$route['send-message'] = 'site/contact_us';
$route['request-an-appraisal'] = 'site/request_appraisal';

