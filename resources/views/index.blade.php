@extends('layouts.frontend')


@section('content')


{{------------------------------------Latest Post--------------------------------------------}}
    @include('includes.latest_post')  {{--The latest post is fetched from the database by FrontEndController using first() commaand--}}



    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">

{{--------------------------Showing the latest three posts of Laravel Category-----------------------}}

                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{$laravel->name}}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($laravel->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured_image}}" alt="laravel">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{route('post.single',$post->slug)}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>

{{--------------------------Showing the latest three posts of Wordpresss Category-----------------------}}

                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{$wordpress->name}}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($wordpress->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured_image}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

{{--------------------------Showing the latest three posts of Wordpresss Category-----------------------}}

                    <div class="padded-50"></div>
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{$tutorial->name}}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($tutorial->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured_image}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>
                </div>
            </div>
        </div>
    </div>



@endsection
