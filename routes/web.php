<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Http\Requests;


/* Route all user requests to user account controllers
 *
 */
Route::get('user','UserAccountController@indexPage');
Route::get('user/signin','UserAccountController@signinPage');
Route::post('user/signin','UserAccountController@doLogin');
Route::get('user/signout','UserAccountController@signoutPage');
Route::get('user/signup','UserAccountController@signupPage');
Route::get('user/profile', 'UserAccountController@profilePage');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Domain home routing to home page request. If querystring is blank in URL route such request to home page.
 *
 */
//Route::get('/','MainController@indexPage');
Route::get('/', function (Request $request) {
    return view('auth.login');
});
// Route::get('home', function (Request $request) {
//     return view('home');
// });

//all below routes are only accessible to logged-in users
Route::group(['middleware' => 'auth'], function () {

	//User Listing and Admin Main Page 
	Route::get('admin/','AdminUsersController@userIntro');
    Route::post('admin/users/','AdminUsersController@updateUserMeta');
    Route::get('admin/{admins}/','AdminUsersController@getUserList');

    //ingest route
    //Route::get('ingest/',function(){
		//return View::make('admin.admin-ingest');
	//});
	Route::get('ingest/','AdminIngestController@getIngest');

    //cms routes 
    Route::get('cms/hotspots/','CMScontroller@getHotspots');
	Route::post('cms/hotspots/','CMScontroller@hotspotActions');
    Route::get('cms/banners/','CMScontroller@getBanners');
	Route::post('cms/banners/','CMScontroller@uploadBanner');

	//Subscription routes 
    Route::get('subscriptions/{subscriptionType}/',function($subscriptionType){
		return View::make('admin.subscriptions-'.$subscriptionType);
	});

 	//trash route
 	Route::get('trash/','AdminContentController@getTrashContents');
	Route::post('trash/','AdminContentController@trashActions');

	//Main Content Listing Page
	Route::get('catalogs/',array('as'=>'catalog.lists','uses'=>'AdminContentController@listALlContents'));

	Route::post('catalogs/','AdminContentController@deleteContent');

	//Add New Content
	Route::get('catalogs/new-content',array('as'=>'new.content','uses'=>'AdminContentController@add_new_view'));
	Route::post('catalogs/new-content/','AdminContentController@new_content_with_params');

	//Content Update
	Route::get('catalogs/update-content/',array('as'=>'update.content','uses'=>'AdminContentController@content_update_view'));
	Route::post('catalogs/update-content/','AdminContentController@updateContent');
	// Route::post('catalogs/destroy/{content_id}','AdminContentController@destroy');

	//catalog listing and insert
	Route::get('catalog-type/{catalog_name}/','AdminCatalogTypeController@catalogType');
	Route::post('catalog-type/catalogtype/','AdminCatalogTypeController@addCatalogType');
	Route::get('catalog-type/delete/{catalog_id}/','AdminCatalogTypeController@removeRow');
	Route::post('catalog-type/catalog','AdminCatalogTypeController@deleteAjaxCatalog');


	

 });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'MainController@homePage')->name('home');