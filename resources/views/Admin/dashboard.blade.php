@extends('layouts.app')

@section('content')
    <div  style=" text-align: center">
        <x-alert />
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card bg-info">
                <div class="card-header text center ">
                    Published posts
                </div>
                <div class="card-body">
                    <h1 class="text-center"> {{$post_count}} </h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-title bg-danger">
                <div class="card-header text center ">
                    Trashed Posts
                </div>
                <div class="card-body">
                    <h1 class="text-center"> {{$trash_count}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-warning ">
                <div class="card-header text center ">
                    Users
                </div>
                <div class="card-body">
                    <h1 class="text-center"> {{$user_count}} </h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-success">
                <div class="card-header text center ">
                    Category
                </div>
                <div class="card-body">
                    <h1 class="text-center"> {{$category_count}} </h1>
                </div>
            </div>
        </div>
    </div>

    @include('includes.googlechart')

@endsection
