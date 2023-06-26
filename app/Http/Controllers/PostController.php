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

    $category=Category::findOrFail($categoryId);

    if($category){
        return $category->posts->count();
    }else{
        echo "Not Category Id Found.Please Valid Id insert";
    }

    
}


// function deletePost($id){

//     // $deletePost=DB::table('posts')->find('4')->delete();
//     // return $deletePost;

//     // $delete=Post::latest();
//     // return $delete->onlyTrashed();

//     //$delete=Post::withTrashed()->where('id',4)->get();

//     // $delete=DB::table('posts')->find($id)
//     //             ->delete();

//                 $delete=Post::findOrFail($id)->delete();   
//               return $delete;
// }



// task=9
function displayPost(){

    $posts=DB::table('posts')
            ->join('categories','posts.category_id','=','categories.id')            
            ->get();
   // return $posts;

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

      $res=Category::find($id);
      $r=$res->latestPost();
      return $r;
    
}













// 2

   public function excerptDescription()
   {
       $posts = DB::table('posts')
           ->select('excerpt', 'description')
           ->get();
        
       return $posts;
   }

//    3
   public function distinctSelectMethod()
   {
       $posts = DB::table('posts')->select('min_to_read')->distinct()->get();
       return $posts;
   }

// 4
   public function retriveFristData ()
   {
       $posts = DB::table('posts')
           ->where('id', 2)
           ->first();
       return $posts->description;
   }

// 5
   public function description()
   {
       $posts = DB::table('posts')
           ->where('id', 2)
           ->value('description');
       return $posts;
   }


// 7
   public function titleColumn()
   {
       $posts = DB::table('posts')
           ->pluck('title');

       return $posts;
   }

// 8
   public function insertData()
   {

       $posts = DB::table('posts')->insert([
           'title' => 'X',
           'slug' => 'X',
           'excerpt' => 'excerpt',
           'description' => 'description',
           'is_published' => true,
           'min_to_read' => 3,
       ]);
       return $posts;
   }


//9
   public function update()
   {
       $update = DB::table('posts')
           ->where('id',  2)
           ->update([
               'excerpt'    => 'Laravel 10',
               'description' => 'Laravel 10',
           ]);
       return $update;
   }

//    10
   public function delete()
   {
       $delete = DB::table('posts')
           ->where('id', 3)
           ->delete();
       return $delete;
   }


   //14

   public function minReadData()
   {
       $posts = DB::table('posts')->whereBetween('min_to_read', [1, 5])->get();
       return $posts;
   }

   //15
   public function incrementByOne()
   {
       $posts = DB::table('posts')
           ->where('id', 3)
           ->increment('min_to_read');
       return $posts;
   }

   function insertIgnore(){
    $posts = [
        [
            'title' => 'First Post',
            'slug' => 'first-post',
            'description' => 'This is the content of the first post.',
            'excerpt'=>'sdsd'
        ],
        [
            'title' => 'Second Post',
            'slug' => 'second-post',
            'description' => 'This is the content of the second post.',
            'excerpt'=>'sdsd'
        ],
        [
            'title' => 'First Post',
            'slug' => 'first-post', // This post will be ignored due to duplicate title/slug
            'description' => 'This is a duplicate post and will be ignored.',
            'excerpt'=>'sdsd'
        ],
    ];
    
    $result = DB::table('posts')->insertOrIgnore($posts);

    return $result;
    
    // if ($result) {
    //     echo "Insertion successful!";
    // } else {
    //     echo "No records were inserted.";
    // }
   }


   function getData(){

    //customizing pagination view command
    // php artisan vendor:publish --tag=laravel-pagination

        // $posts=DB::table('posts')->get();
         $posts=DB::table('posts')->paginate(1);

        return view('posts',['posts'=>$posts],['isPosted'=>true]);

   }

   function getDataJson(){

    $data=DB::table('posts')->paginate(3);
    return $data;

   }


}
