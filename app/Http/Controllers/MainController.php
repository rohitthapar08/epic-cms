<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Corcel\Model\Post;
use Illuminate\Support\Facades\Auth;
use Corcel\Model\User;
use Corcel\Services\PasswordService;
use Hash;
use Illuminate\Support\Facades\Redis;
use Corcel\Model\Taxonomy;
class MainController extends Controller
{
    /* Main - Pass to actions depend upon login
    *
    */

    protected static $catnav;
    

    public function __construct(){

    }
    public static function indexPage(){
    	error_reporting(E_ALL ^ E_NOTICE);

    	/****** Get post table data is working using below snippet *******/
    	//$posts = new Post();
    	//$p = $posts->all();
    	//$p1=Post::type('product')->get();
    	//$p2 = Post::status('publish')->get()->toArray();
    	//echo "<PRE>";print_r($p->toArray());echo "</pre>";
    	//echo "<PRE>";print_r($p1->toArray());echo "</pre>";
    	//echo "<PRE>";print_r($p2);echo "</pre>";
    	/****** END - Get post table data is working using below snippet *******/


    	/****** Authetication is working using below snippet *******/
		//if(Auth::validate(['email' => 'prafull.bsl@gmail.com', 'password' => 'admin@12345'])){
		//    echo "successfull logged in"; //$user = Auth::getSession();
		//} else {
		//	echo "Invalid auth details";
		//}
		/****** END - Authetication is working using below snippet *******/


		/****** New User Registration **************
		$user = new User();
		$password = 'admin@12345';
		$user->user_pass = (new PasswordService())->makeHash($password); 		
		//echo $user->password;	//echo "<br>";	//echo Hash::make($password);//echo "<br>";
		$user->user_email = 'shopmanager@skart12345.com';
		$user->user_login = 'shopmanagername';
		//$user->save();*/

		//$userProvider = new Corcel\Providers\AuthUserProvider();
		//$user = $userProvider->retrieveByCredentials(['username' => 'admin']);
		//if(!is_null($user) && $userProvider->validateCredentials($user, ['password' => 'admin@12345'])) {

		/****** Work with Redis ********************
		$id = 110;
		//$productData = Redis::get('SK-PRODUCT-'.$id);
		$productData = Redis::get('test');
		echo "<PRE>";print_r($productData);echo "</pre>";
		//var_dump(Redis::set('settest','setting up data'));
		/***** END - Work with Redis **************/

		//$solrquery = 'category:wooden';
		//pr(curlSelectRequest($solrquery));
		//$catnavigation = self::_getCatNav();
        //return view('home', compact('catnavigation'));
        return self::homePage();
    }

    public static function homePage(){
    	return view('home');
    	
    }

    
}
