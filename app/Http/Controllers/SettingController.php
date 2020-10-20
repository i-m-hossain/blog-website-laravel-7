<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('admin');
    }


    public function index(){

        $setting = Setting::first();
        return view('Admin.setting.setting', compact('setting'));
    }
    public function update(Request $request, $id){

        $validateInput= $request->validate([
            'site_name'=>'required',
            'contact_number'=>'required',
            'contact_email'=>'required',
            'address'=>'required',
        ]);

        $setting = Setting::first();
        $setting->site_name = $request->site_name;
        $setting->contact_number = $request->contact_number;
        $setting->contact_email = $request->contact_email;
        $setting->address = $request->address;
        $setting->save();

        return redirect()->back()->with('message', 'The settings has been updated successfully');
    }


}
