

@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">All Categories</div>
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <table class="table table-hover table-light">
                <thead>
                <tr>

                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>
                @if($categories->count()>0)
                    @foreach($categories as $category)
                        <tbody class="">
                        <tr>

                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('category.edit',$category->id)}}"><span class="fas fa-edit"/></a></td>
                            <td> <span onclick="event.preventDefault();
                                    if(confirm('Are you really want to delete this?')){
                                    document.getElementById('form-delete-{{$category->id}}')
                                    .submit()
                                    }" class="fas fa-trash px-3 text-danger cursor-pointer  "/>

                                <form id="{{'form-delete-'.$category->id}}"  action="{{route('category.destroy',$category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                            </td>


                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody>
                    <td colspan="5" class="text-center">There is no categories</td>
                    </tbody>
                @endif
            </table>

        </div>

    </div>


@endsection
