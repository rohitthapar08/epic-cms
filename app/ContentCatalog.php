<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Content;

class ContentCatalog extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'content_catalog';
    protected $fillable = array(
        'content_id',
        'catalog_id',
        'content_genre',
    );
    public $timestamps = false;

    public function content(){
    	
        return $this->belongsTo('App\Content', 'content_id');
    }
    
}