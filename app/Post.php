<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;


    protected $fillable= [
      'title',
      'content',
      'category_id',
      'featured_image',
       'slug'
    ];
    protected $dates=['deleted_at'];

    // Defining Accessor of Post's featured image attribute which will return the public path of the image
    public function getFeaturedImageAttribute($featured_image)
    {
        return asset($featured_image);
    }

    //inverse has many relationship between Post and Category models
    public function category(){
        return $this->belongsTo('App\Category');
    }


    public function tags(){
        return $this->belongsToMany('App\Tag');
    }


}
