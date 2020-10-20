<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{$latestpost->featured_image}}" alt="seo">
                    <div class="overlay"></div>
                    <a href="{{$latestpost->featured_image}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info">

                        <h2 class="post__title entry-title ">
                            <a href="15_blog_details.html">{{$latestpost->title}}</a>
                        </h2>

                        <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$latestpost->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                            <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$latestpost->category->name}}</a>
                                        </span>

                            <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                        </div>
                    </div>
                </div>

            </article>
        </div>
        <div class="col-lg-2"></div>
    </div>


    {{--Second latest post--}}


    <div class="row">
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{$secondpost->featured_image}}" alt="seo">
                    <div class="overlay"></div>
                    <a href="{{$secondpost->featured_image}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info">

                        <h2 class="post__title entry-title ">
                            <a href="15_blog_details.html">{{$secondpost->title}}</a>
                        </h2>

                        <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$secondpost->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                            <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$secondpost->category->name}}</a>
                                        </span>

                            <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                        </div>
                    </div>
                </div>

            </article>
        </div>


{{--   Third Post    --}}


        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{$thirdpost->featured_image}}" alt="seo">
                    <div class="overlay"></div>
                    <a href="{{$thirdpost->featured_image}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info">

                        <h2 class="post__title entry-title ">
                            <a href="15_blog_details.html">{{$thirdpost->title}}</a>
                        </h2>

                        <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$thirdpost->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                            <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$thirdpost->category->name}}</a>
                                        </span>

                            <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                        </div>
                    </div>
                </div>

            </article>
        </div>
    </div>
</div>
