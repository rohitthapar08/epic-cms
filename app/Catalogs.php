<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalogs extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'catalog';
    protected $fillable = array(
        'name',
        'slug',
        'menu_icon',
        'type',
        'show_in_menu'
    );
    public $timestamps = false;
    
}