

@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <form action="{{route('category.update', $category->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group" >
                    <label for="name">Edit Category</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group" >
                    <input type="submit" class="btn btn-success"  value="Update Category">
                </div>

            </form>
        </div>
    </div>
@endsection
