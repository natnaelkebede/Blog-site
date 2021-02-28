<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
        use SoftDeletes;

    protected $fillable = [
        'title', 'content','featured', 'catagory_id','slig'
    ];
    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    public function catagories()

        {
            return $this->belongsTo('App\catagory');
        }
}
