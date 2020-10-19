@extends('layouts.app')



@section('content')

    <div class="card">
        <div class="card-header">Published Post</div>
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <table class="table table-hover table-light">
                <thead>
                <tr>

                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Featured Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Trash</th>


                </tr>
                </thead>
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <tbody >
                        <tr>

                            <td>{{$post->title}}</td>

                            <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
                            <td >
                                @foreach($post->tags as $tags)
                                        {{$tags->tag}}
                                @endforeach
                            </td>


                            <td><img src="{{$post->featured_image}}" alt="image" width="80px" ></td>
                            <td>{{$post->content}}</td>
                            <td><a href="{{route('post.edit',$post->id)}}"><span class="fas fa-edit"/></a></td>
                            <td> <span onclick="event.preventDefault();
                                    if(confirm('Do you want to trash this post?')){
                                    document.getElementById('form-delete-{{$post->id}}')
                                    .submit()
                                    }" class="btn btn-danger btn-sm">Trash</span>

                                <form id="{{'form-delete-'.$post->id}}"  action="{{route('post.destroy',$post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody>
                    <td colspan="5" class="text-center">There is no post</td>
                    </tbody>
                @endif

            </table>


        </div>
    </div>

@endsection
