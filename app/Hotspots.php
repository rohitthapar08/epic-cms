<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotspots extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'hotspots';
    protected $fillable = array(
        'hotspot_name',
        'content_id'
    );

    public $timestamps = false;
}