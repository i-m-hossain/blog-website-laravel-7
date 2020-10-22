<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_count = count(Post::all());
        $user_count = count(User::all());
        $trash_count =count(Post::onlyTrashed()->get()) ;
        $category_count = count(Category::all());
        return view('Admin.dashboard', compact([
            'post_count',
            'trash_count',
            'category_count',
            'user_count',
        ]));
    }


}
