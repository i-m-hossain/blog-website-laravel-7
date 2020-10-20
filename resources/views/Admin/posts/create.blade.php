@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Create a new post</div>
        <div class="card-body">


{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif --}}{{-- Displaying Validation Errors --}}
            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured image</label>
                    <input type="file" name="featured_image" id="featured_image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="">Select a category</label>
                    <select class="form-control" id="sel1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Select Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check ">
                            <label> <input type="checkbox" name="tags[]" class="mr-2 " value="{{$tag->id}}">{{ $tag->tag }} </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" id="tiny" rows="5" column="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Submit">
                </div>

            </form>

        </div>

    </div>
@endsection


@section('styles')

@endsection

@section('scripts')

    <script src="https://cdn.tiny.cloud/1/hj792k117l0inekz8p0lwczrmdvvlgz7lf0vx3dooh2q937o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tiny',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endsection
