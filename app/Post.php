<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Post extends Model
{

    protected $connection = 'default';    
    protected $table = 'posts';
    protected $primaryKey = 'ID';
   // adding a global scoope in yoour post model
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('post_type', function (Builder $builder) {
            $builder->where('post_type','post');
            
        });
    }
    public function scopeOfType($query, $type)
    {
        return $query->where('post_type', $type);
    }
} 