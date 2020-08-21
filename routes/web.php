<?php

use Illuminate\Support\Facades\Route;
use App\Post;
Use App\Tag;
Use App\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

        $post = Post::create(['name'=>'test']);

        $tag = Tag::find(1);

        $post->tags()->save($tag);

        $video = Video::create(['name'=>'test.mp4']);

        $tag_movie = Tag::find(2);

        $video->tags()->save($tag_movie);
});


Route::get('/read', function(){

    $post = Post::findOrFail(2);

    foreach($post->tags as $tag){

        echo $tag;
    }
});

Route::get('/update', function(){

    $post = Post::findOrFail(2);

//    foreach($post->tags as $tag){

  //     $tag->whereName('Bier')->update(['name'=>'Krat bier']);
 //   }
    $tag = Tag::find(1);

    //$post->tags()->save($tag);
    $post->tags()->sync([1]);
});

Route::get('/delete', function(){

    $post = Post::find(2);

    foreach($post->tags as $tag){

        $tag->whereId(1)->delete();
    }

});