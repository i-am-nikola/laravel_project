<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'intro', 'content', 'image', 'keyword', 'description', 'user_id', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function product_image(){
        return $this->hasMany('App\ProductImage');
    }

}
