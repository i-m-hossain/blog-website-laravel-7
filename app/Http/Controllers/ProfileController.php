<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        return view('Admin.user.profile',compact('user'));

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
        $validationdata = $request->validate([

            'name'=> 'required',
            'email'=> 'required|email',
            'password'=>'confirmed',
            'facebook'=>'required|url',
            'instagram'=>'required|url',
            'twitter'=>'required|url',
            'youtube'=>'required|url',


        ]);

        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/uploads/avatar');
            $image->move($destinationPath, $name);
            $user->profile->avatar = 'uploads/avatar/'.$name;
            $user->profile->save();
        }   //if the file is uploaded only then image is restored

        if ($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        } //if password is given, only then password will be changed


        $user->profile->facebook = $request->facebook;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->instagram = $request->instagram;
        $user->profile->twitter = $request->twitter;
        $user->profile->about = $request->about;

        $user->save();
        $user->profile->save();
        return redirect()->back()->with('message', 'Your profile has been updated successfully');
    }


}
