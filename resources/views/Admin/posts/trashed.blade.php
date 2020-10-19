@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">All Trashed post</div>
        <div class="card-body">

        </div>
        <div  style=" text-align: center">
            <x-alert />
        </div> {{--   Displaying the error/success message     --}}

        <table class="table table-hover table-light">
            <thead>
            <tr>

                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Featured Image</th>
                <th scope="col">Content</th>
                <th scope="col">Restore</th>
                <th scope="col">Destroy</th>


            </tr>
            </thead>
            @if($posts->count()>0)
                @foreach($posts as $post)
                    <tbody >
                    <tr>

                        <td>{{$post->title}}</td>
                        <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
                        <td><img src="{{$post->featured_image}}" alt="image" width="80px" ></td>
                        <td>{{$post->content}}</td>
                        <td><a href="{{route('post.restore',$post->id)}}"><span class="fas fa-trash-restore px-3 cursor-pointer"/></a></td>
                        <td> <span onclick="event.preventDefault();
                                if(confirm('Do you want to delete this parmanently?')){
                                document.getElementById('form-delete-{{$post->id}}')
                                .submit()
                                }" class="fas fa-trash px-3 text-danger cursor-pointer "/>

                            <form id="{{'form-delete-'.$post->id}}"  action="{{route('post.kill',$post->id)}}" method="post">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <td colspan="5" class="text-center">There is no trashed post</td>
                </tbody>
            @endif

        </table>
    </div>



@endsection


