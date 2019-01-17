<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Content;

class ContentMeta extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'content_meta';
    protected $fillable = array(
        'content_id',
        'meta_key',
        'meta_value'
    );

    public $timestamps = false;

    public function content(){

        return $this->belongsTo('App\Content', 'content_id');
    }

}