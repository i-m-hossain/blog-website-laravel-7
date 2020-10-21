<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $laravel = Category::where('name', 'Laravel')->get()->first();
        $wordpress = Category::where('name', 'wordpress')->get()->first();
        $tutorial = Category::where('name', 'tutorials')->get()->first();
        $latestpost = Post::orderBy('created_at','desc')->first();
        $secondpost = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $thirdpost = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $categories = Category::all()->take(6);
        $setting = Setting::first();

        return view('index', compact([
            'setting',
            'categories',
            'latestpost',
            'secondpost',
            'thirdpost',
            'laravel',
            'wordpress',
            'tutorial',

        ]));
    }
    public function singlePost($slug){

        $tags = Tag::all();
        $post = Post::where('slug', $slug)->get()->first();

        //For next and prev button (pagination)

        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');
        $next =Post::find($next_id);
        $prev =Post::find($prev_id);

        //end pagination

        $categories = Category::all()->take(6);
        $setting = Setting::first();

        return view('single', compact([
            'post',
            'next',
            'prev',
            'setting',
            'categories',
            'tags'

        ]));
    }

    public function category($id){
        $tags = Tag::all();
        $category = Category::find($id);
        $posts = $category->posts;
        $setting = Setting::first();
        $categories = Category::all()->take(6);

        return view('category',compact([
            'category',
            'posts',
            'setting',
            'categories',
            'tags'
        ]));
    }

    public function tag($id){



        $tag = Tag::find($id);
        $posts = $tag->posts;
        $tags =Tag::all();
        $setting = Setting::first();
        $categories = Category::all()->take(6);

        return view('tag',compact([
            'tag',
            'tags',
            'posts',
            'setting',
            'categories',

        ]));
    }
    public function userPost($id){

        $user = User::find($id);
        $posts= $user->posts;
        $categories = Category::all();
        $setting = Setting::first();
        $tags = Tag::all();
        return view('userpost',compact([
            'categories',
            'posts',
            'setting',
            'categories',
            'tags',
            'user'


        ]));
    }



}
