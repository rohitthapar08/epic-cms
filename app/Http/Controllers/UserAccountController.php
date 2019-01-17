<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use Redirect;
use Auth;
use Corcel\Model\User;
use Request;
use Validator;
//use Input;
class UserAccountController extends Controller
{

   	public function __construct(){
      //$this->middleware('auth');
   		//Route::get('/', function () {
    		//return view('profile');
		//});
   	}

	public function indexPage($request){
      //$this->middleware('auth');
   		//Route::get('/', function () {
    		//return view('profile');
		//});
		pr($request);
    }

    public function profilePage(){
    	return view('user.profile');
    }

    public function signinPage(){
    	//return view('user.signin');
    	return Redirect::to('login');
    }

    public function signoutPage(){
    	return view('user.signout');
    }

    public function signupPage(){
    	return view('user.registration');
    }   

    public function doLogin(){
    	//pr($_POST);die;
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
//pr(Request::all());die;
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Request::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Request::post('email'),
		        'password'  => Request::post('password')
		    );
//pr($userdata);die;
		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        echo 'SUCCESS!';die;

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('signin');

		    }

		}
	}
}
