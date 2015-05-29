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
$route['property/customer-appraisals'] = 'admin/property/customer_appraisals';

/*
*	Slider Routes
*/
//slides
$route['administration/all-slides'] = 'admin/slideshow/index';
$route['administration/all-slides/(:num)'] = 'admin/slideshow/index/$1';//with a page number
$route['administration/add-slide'] = 'admin/slideshow/add_slide';
$route['administration/edit-slide/(:num)/(:num)'] = 'admin/slideshow/edit_slide/$1/$2';
$route['administration/activate-slide/(:num)/(:num)'] = 'admin/slideshow/activate_slide/$1/$2';
$route['administration/deactivate-slide/(:num)/(:num)'] = 'admin/slideshow/deactivate_slide/$1/$2';
$route['administration/delete-slide/(:num)/(:num)'] = 'admin/slideshow/delete_slide/$1/$2';


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
$route['blog/category/(:num)'] = 'site/blog_category/$1';
$route['blog/category/(:num)/(:num)'] = 'site/blog_category/$1/$2';


/* End of file routes.php */
/* Location: ./application/config/routes.php */



$route['home'] = 'site/home_page';
$route['properties'] = 'site/property';
$route['properties/(:num)'] = 'site/property/$1';
$route['properties/for-sale'] = 'site/property_onsale';
$route['properties/for-sale/(:num)'] = 'site/property_onsale/$1';
$route['properties/sold'] = 'site/property_sold';
$route['properties/sold/(:num)'] = 'site/property_sold/$1';
$route['properties/view-single/(:num)'] = 'site/property_detail/$1';
$route['print-brochure/(:num)'] = 'site/brochure/$1';
$route['request'] = 'site/contact';
$route['contact'] = 'site/contact';
$route['news'] = 'site/blog';
$route['news/(:num)'] = 'site/blog/$1';
$route['news/view-single/(:num)'] = 'site/blog_detail/$1';
$route['about'] = 'site/about';
$route['service/(:num)'] = 'site/service/$1';
$route['search-properties'] = 'site/search_properties/1';
$route['search-properties-sold'] = 'site/search_properties/2';
$route['close-search'] = 'site/close_property_search';
$route['request-news-letter'] = 'site/request_newsletter';
$route['send-message'] = 'site/contact_us';
$route['request-an-appraisal'] = 'site/request_appraisal';
$route['blog/add-comment/(:num)'] = 'site/add_blog_comment/$1';

