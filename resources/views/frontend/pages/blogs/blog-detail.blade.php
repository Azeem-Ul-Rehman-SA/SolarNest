@extends('frontend.layout.app')
@section('title',$blog->meta_title ?? 'Blog Detail')
@section('description',$blog->meta_description ?? 'Blog Detail')
@section('keywords',$blog->keywords ?? 'Blog Detail')
@section('content')
    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1>Blogs</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="blog_detail_page_area">
        <div class="blog_detail_sec">
            <span class="blog_detail_sec_span">
                <!-- blog details -->
                <div class="blog_title_block">
                    <div class="blog_title">
                        <h2>{{ ucfirst($blog->name) }} </h2>
                    </div>
                    <div class="blog_upload_detail">
                        <div class="date">
                            <p>{{$blog->created_at->format('F j, Y')}} <i class="fa fa-calendar"></i></p>
                        </div>
                        <div class="day">
                            <p>{{$blog->created_at->format('l')}} <i class="fa fa-clock-o"></i></p>
                        </div>
                    </div>
                </div>
                <div class="blog_detail_area">
                    <div class="post_info">
                        <div class="authr_info">
                            <p>BY: {{ $blog->author_name }}</p>
                        </div>
                        <div class="blog_types">
                             @if(!empty($blog->categories) && count($blog->categories) > 0)
                                @foreach($blog->categories as $category)
                                    <div class="blog_type_tag">
                                        {{ucfirst($category->name)}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="blog_detail_img">
                        <div class="img_container">
                            <img src="{{asset('/uploads/blogs_images/'.$blog->image) }}">
                        </div>
                    </div>
                    <div class="blog_detail_text">
                       {!! $blog->description !!}
                    </div>
                    <!-- hashtags wrapper -->
                    <div class="hashtags_wrap">
                        <div class="hastags_listing">
                           @if(!empty($blog->tags) && count($blog->tags) > 0)
                                @foreach($blog->tags as $tag)
                                    <div class="hashtag">
                                        #{{ucfirst($tag->name)}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </span>
        </div>
        @if(!empty($featuredBlogs) && count($featuredBlogs) > 0)
            <div class="blog_detail_featured">
                <div class="title_decor_line">
                    <h2>Featured Blogs </h2>
                </div>
            </div>
            <!-- blog detail page featured blogs -->
            <div class="row">
                @foreach($featuredBlogs as $featuredBlog)
                    <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                        <div class="blog">
                    <span>
                        <div class="blog_banner">
                            <img src="{{asset('/uploads/blogs_images/thumbnails/'.$featuredBlog->image) }}">
                        </div>
                        <div class="blog_inner">
                            <div class="blog_short_detail">
                                <h3>{{ ucfirst($featuredBlog->name) }}</h3>
                                <p>{!! \Illuminate\Support\Str::limit($blog->summary,170) !!}</p>
                            </div>
                            <div class="read_more_btn">
                                <a class="read_more" href="{{ route('blog.show',$featuredBlog->slug) }}">Read More</a>
                            </div>
                        </div>
                    </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @include('frontend.components.contact')
@endsection
