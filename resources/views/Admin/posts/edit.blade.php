@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Edit post</div>
        <div class="card-body">


{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif --}}{{-- Displaying Validation Erooros --}}

            <div  style=" text-align: center">
                <x-alert />
            </div>{{--flash session alert--}}

            <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured image</label>
                    <input type="file" name="featured_image" id="featured_image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="">Select a category</label>
                    <select class="form-control" id="sel1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{$post->category_id == $category->id ? 'selected="selected"' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Tags">Select Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check ">
                            <label> <input type="checkbox" name="tags[]" class="mr-2 " value="{{$tag->id}}"
                                    @foreach($post->tags as $t)
                                        @if($tag->id == $t->id)
                                            checked
                                        @endif
                                    @endforeach
                                >{{ $tag->tag }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" rows="5" column="10" >{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Update post">
                </div>

            </form>

        </div>

    </div>
@endsection
