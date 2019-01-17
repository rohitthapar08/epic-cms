<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Corcel\Model\User;
use Corcel\Services\PasswordService;
use Redirect;
use Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_nicename' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_pass' => 'required|string|min:6|confirmed',
        ]);
        /*$rules = ['user_nicename' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_pass' => 'required|string|min:6|confirmed',];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            //return Redirect::to('register')
            //    ->withErrors($validator) // send back all errors to the login form
            //    ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
            $messages = $validator->messages();
            foreach ($messages->all('<li>:message</li>') as $message)
            {
                echo $message;
            }
        }*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*return User::create([
            'user_nicename' => $data['user_nicename'],
            'user_email' => $data['user_email'],
            'user_pass' => (new PasswordService())->makeHash($data['user_pass']), 
        ]);*/

        $user = new User();
        $user->user_status = 1;
        $user->user_nicename = $data['user_nicename'];
        $user->display_name = $data['user_nicename'];
        $user->user_pass = (new PasswordService())->makeHash($data['user_pass']);        
        $user->user_email = $data['user_email'];
        $user->user_login = substr($data['user_email'],0,strpos($data['user_email'],"@"));
        $userrole= array('customer' => true);
        if($user->save()) {
            $user_id = $user->ID;
            $user->saveMeta([
                'first_name' => $data['user_nicename'],
                'last_name' => '',
                'wp_capabilities' => serialize($userrole),
                'wp_user_level' => 0 
            ]);
            return $user;   
        }
        else { RegistersUsers::showRegistrationForm(); return false; }
        //Hash::make($data['password']),
    }
}
