<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // public function posts(){

    //    //$this->belongsTo(Category::class);

    //    // public function posts(){
    //    $this->hasMany(Post::class);
    // // }
    // }
    public function category(){
       return $this->belongsTo(Category::class);
      }
    public function latestPost(){
        return $this->posts()->latest->first();
    }
}
