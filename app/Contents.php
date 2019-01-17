<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ContentMeta;
use App\ContentCatalog;

class Contents extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'content';
    protected $fillable = array(
        'content_title',
        'content_slug',
        'content_type',
        'content_parent',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        'content_video_url',
        'content_trailer_url',
        'content_excerpt',
        'content_description',
        'content_status',
        'content_order'
    );

    public $timestamps = false;

    public function content_meta(){
        return $this->hasMany('App\ContentMeta', 'content_id');
    }

    public function content_catalog(){
        return $this->hasMany('App\ContentCatalog', 'content_id');
    }

}