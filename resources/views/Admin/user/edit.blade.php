@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Edit post</div>
        <div class="card-body">

            <div  style=" text-align: center">
                <x-alert />
            </div>{{--flash session alert--}}

            <form action="{{route('user.update',$user->id)}}" method="post" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="Email" name="email"  class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="form-group">
                    <label for="Admin">Admin</label>
                    <select name="admin" id="" class="form-control">
                        <option value='0'>0</option>
                        <option value='1'>1</option>

                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Update user">
                </div>

            </form>

        </div>

    </div>
@endsection
