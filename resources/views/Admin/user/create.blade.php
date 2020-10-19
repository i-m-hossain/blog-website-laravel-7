@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Create a new User</div>
        <div class="card-body">

            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('user.store')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""Email>Email</label>
                    <input name="email" type="email" class="form-control">
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="password">Password</label>--}}
{{--                    <input type="password" class="form-control" id="password" name="password">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password_confirmation">Confirm Password</label>--}}
{{--                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="Admin">Admin</label>--}}
{{--                    <select name="admin" id="" class="form-control">--}}
{{--                        <option value='0'>0</option>--}}
{{--                        <option value='1'>1</option>--}}

{{--                    </select>--}}
{{--                </div>--}}


                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Create User">
                </div>

            </form>

        </div>

    </div>
@endsection
