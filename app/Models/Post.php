<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','image','title','content'];

    //inner join Post and Category(one to many)
    public function category(){
        //this ka post.php
        //post.php ko category ka paing tal
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
