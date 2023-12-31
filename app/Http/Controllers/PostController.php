<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{      
   

// task-5
  function getPost(){
    // using Eloquent ORM retrieve all post also category
    $posts=Post::with('category')->get();   
    return $posts;
}


// task-6

 function getCount($categoryId){

     $postCount=Post::where('category_id',$categoryId)->count();
    return $postCount;

    
 }

// task-7
function deletePost($id){


    $delete=Post::findOrFail($id)->delete();  
    
    if($delete){
        return "successfully soft deleted";
    }else{
        return "Failed Soft Deleted";
    }

}

// task-8

public function getSoftData(){

    $softData=Post::onlyTrashed()->get();
    return $softData;
}


// task=9
function displayPost(){

    $posts=DB::table('posts')
            ->join('categories','posts.category_id','=','categories.id')            
            ->get();
   

   return view('posts',compact('posts'));


}

// task 10:

function getCategoryIdPost($id){

 $category=DB::table('categories')
            ->join('posts','categories.id','=','posts.category_id')
            ->where('posts.category_id','=',$id)
            ->get();      

    return $category;   
}


// task-11

function getlatestPosts($id){

      $latestPost=Category::findOrFail($id)->latestPost();     
      return $latestPost;
    
}


// task -12

function getLatestCategoryPosts(){

    $categoriesPost=Category::all();

    return view('categories',compact('categoriesPost'));
}



}
