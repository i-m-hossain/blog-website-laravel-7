

@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="form-group" >
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="form-group" >
                    <input type="submit" class="btn btn-success col-sm-3"  value="Create Category">
                </div>


            </form>



        </div>
    </div>
@endsection
