

@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">All tags</div>
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <table class="table table-hover table-light">
                <thead>
                <tr>

                    <th scope="col">Tag Title</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>
                @if($tags->count()>0)
                    @foreach($tags as $tag)
                        <tbody class="">
                        <tr>

                            <td>{{$tag->tag}}</td>
                            <td>{{$tag->created_at->diffForHumans()}}</td>
                            <td>{{$tag->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('tag.edit',$tag->id)}}"><span class="fas fa-edit"/></a></td>
                            <td> <span onclick="event.preventDefault();
                                    if(confirm('Are you really want to delete this?')){
                                    document.getElementById('form-delete-{{$tag->id}}')
                                    .submit()
                                    }" class="fas fa-trash px-3 text-danger cursor-pointer  "/>

                                <form id="{{'form-delete-'.$tag->id}}"  action="{{route('tag.destroy',$tag->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                            </td>


                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody>
                    <td colspan="5" class="text-center">There is no tag available</td>
                    </tbody>
                @endif
            </table>

        </div>

    </div>


@endsection
