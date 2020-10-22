<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('Admin.user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaidationData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',


        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'), //creating a default password

        ];

        $user = User::create($data);


        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.jpg'
        ]);



        return redirect()->back()->with('message', 'User has been created successfully');

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
//        //
//        $user = User::find($id);
//        return view('Admin.user.edit', compact('user'));

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
        //
//        $vaidationData = $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|confirmed',
//
//        ]);
//
//        $user =User::find($id);
//
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->admin = $request->admin;
//
//        $user->save();
//
//        return redirect()->back()->with('message', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::find($id)->delete();
        return redirect()->back()->with('message', 'User has been deleted successfully');

    }

    public function admin($id){

        $user = User::find($id);
        $user->admin = 1;

        $user->save();
        return redirect()->back()->with('message','the user has become admin');


    }
    public function notAdmin($id){

        $user = User::find($id);
        $user->admin = 0;

        $user->save();
        return redirect()->back()->with('message','the user has become admin');


    }
}
