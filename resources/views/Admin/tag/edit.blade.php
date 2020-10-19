

@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <form action="{{route('tag.update', $tag->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group" >
                    <label for="tag">Edit tag</label>
                    <input type="text" class="form-control" name="tag" value="{{$tag->tag}}">
                </div>
                <div class="form-group" >
                    <input type="submit" class="btn btn-success"  value="Update tag">
                </div>

            </form>
        </div>
    </div>
@endsection
