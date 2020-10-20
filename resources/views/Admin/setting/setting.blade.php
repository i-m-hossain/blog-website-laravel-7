@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Edit blog settings</div>
        <div class="card-body">

            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('settings.update', $setting->id )}}" method="post" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input name="site_name" type="text" class="form-control" value="{{$setting->site_name}}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input name="contact_number" type="text" class="form-control" value="{{$setting->contact_number}}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input name="contact_email" type="email" class="form-control" value="{{$setting->contact_email}}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" value="{{$setting->address}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Update settings">
                </div>

            </form>

        </div>

    </div>
@endsection
