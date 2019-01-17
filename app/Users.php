<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'users';
    protected $fillable = array(
        'user_login',
        'user_pass',
        'user_email',
        'user_registered',
        'user_role',
        'user_status',
        'display_name'
    );

    public $timestamps = false;

    public function getUserData($user_ID){
        return DB::table('users')->where('ID','=', $user_ID)->get();
    }

}