@extends('layouts.app')



@section('content')

    <div class="card">
        <div class="card-header">All users</div>
        <div class="card-body">
            <div  style=" text-align: center">
                <x-alert />
            </div>
            <table class="table table-hover table-light">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Permission</th>
{{--                    <th scope="col">Edit</th>--}}
                    <th scope="col">Delete</th>


                </tr>
                </thead>
                @if($users->count()>0)
                    @foreach($users as $user)
                        <tbody >
                        <tr>

                            <td><img src="{{ asset($user->profile->avatar) }}" alt="image" width="60px" height="60px" style="border-radius: 50%"></td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->admin)
                                    <a href='{{route('user.notadmin', $user->id)}}' class='btn  btn-danger btn-sm'> remove permission</a>
                                @else
                                    <a href='{{route('user.admin',$user->id)}}' class="btn btn-success btn-sm">make admin</a>
                                @endif
{{--                            <td><a href="{{route('user.edit',$user->id)}}"><span class="fas fa-edit"/></a></td>--}}
                            @if(Auth::id() !== $user->id)
                                <td> <span onclick="event.preventDefault();
                                        if(confirm('Do you want to delete this user?')){
                                        document.getElementById('form-delete-{{$user->id}}')
                                        .submit()
                                        }" class="fas fa-trash text-danger"/>

                                    <form id="{{'form-delete-'.$user->id}}"  action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>
                            @endif
                        </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody>
                    <td colspan="5" class="text-center">There is no user</td>
                    </tbody>
                @endif

            </table>


        </div>
    </div>

@endsection
