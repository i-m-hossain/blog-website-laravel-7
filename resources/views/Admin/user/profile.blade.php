@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Edit your profile</div>
        <div class="card-body">

            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="usename">Username</label>
                    <input name="name" type="text" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email"  value="{{$user->email}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload new avatar</label>
                    <input type="file" name="avatar" class="form-control-file" >
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="facebook">Youtube Profile</label>
                    <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="facebook">Instagram Profile</label>
                    <input type="text" name="instagram" value="{{$user->profile->instagram}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="facebook">Twitter profile</label>
                    <input type="text" name="twitter" value="{{$user->profile->twitter}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" cols="30" rows="5" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Update profile">
                </div>

            </form>

        </div>

    </div>
@endsection
