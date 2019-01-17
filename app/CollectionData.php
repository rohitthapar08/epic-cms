<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Collections;

class CollectionData extends Model{

	protected $connection = 'mysql';
    protected $primaryKey = 'ID';
    protected $table = 'collection_data';
    protected $fillable = array(
        'collection_id',
        'content_type',
        'content_id'
    );
    public $timestamps = false;

    public function collection_id(){

        return $this->belongsTo('App\Collections', 'collection_id');
    }
    
}