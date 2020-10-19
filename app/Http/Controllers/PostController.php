<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//         $this->middleware('auth');
//    }


    public function index()
    {
        //
        $posts = Post::all();
        return view('Admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all(); //for select dropdown
        $tags = Tag::all(); //for checkbox data

        if(count($categories)== 0 || count($tags)==0){

            return redirect()->back()->with('error', 'You must have some categories and a tags to create a post');
        } //if there is no category user must creat a category first to creat a post



        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'content' => ['required'],
            'featured_image' => ['required'],
            'category_id' => ['required'],
            'tags'=>['required']

        ]);//validating request data

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/uploads/post');
            $image->move($destinationPath, $name);

        } //image has been uploaded to public upload/post directory and got the original name

         $data = [
             'title' =>$request->title,
             'featured_image' => 'uploads/post/'.$name,  //there is a accessor for this attribute which makes it as a path
             'category_id' => $request->category_id,
             'content' => $request->content,
             'slug' => Str_slug($request->title),   //Creating slug for the title

         ];


        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        return redirect()->back()->with('message', 'The post is successfully created');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $post= Post::findOrFail($id);
        $tags = Tag::all();
        return view('Admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => ['required','max:255'],
            'content' => ['required'],
            'category_id' => ['required'],
        ]); //validation

        $post = Post::find($id);


        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/uploads/post');
            $image->move($destinationPath, $name);
            $post->featured_image = 'uploads/post/'.$name;
        }   //if the file is uploaded only then image is restored

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        $post->save();  //After assigning the updating feild it will be saved

        $post->tags()->sync($request->tags); //instead of attach method we need to use sync in order to update


        return redirect()->back()->with('message', 'The post is successfully updated');




    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back()->with('message', ' The post has been moved to trash');
    }
    /**
     * Display the listing of the trashed resource from storage.
     *
     */

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('Admin.posts.trashed', compact('posts'));

    }
    /**
     * Deleting parmanently the trashed post from storage.
     *
     */


    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back()->with('message', 'The post is deleted parmanently');
    }

    /**
     * Restoring the trashed post from storage.
     *
     */

    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('message', 'The post is restored successfully');
    }

}

