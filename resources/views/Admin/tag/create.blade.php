@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Create a new tag</div>
        <div class="card-body">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif {{-- Displaying Validation Errors --}}
            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('tag.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tag title</label>
                    <input name="tag" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Create Tag">
                </div>

            </form>

        </div>

    </div>
@endsection
