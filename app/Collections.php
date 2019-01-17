<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\CollectionData;

class Collections extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'collections';
    protected $fillable = array(
        'name',
        'collection_type',
        'collection_content_type_id',
        'collection_order',
        'data'
    );
    public $timestamps = false;

    public function collection_data(){
        return $this->hasMany('App\CollectionData', 'collection_id');
    }
    
}