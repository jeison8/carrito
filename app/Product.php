<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['img','name','price','detail','categories_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
