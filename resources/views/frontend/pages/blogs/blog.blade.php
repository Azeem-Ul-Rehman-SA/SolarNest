@extends('frontend.layout.app')
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
    <div class="blog_page_area">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-8 col-12">
                <div class="blog_page_blog_listing">
                    <span class="blog_listing_span">
                          @if(!empty($blogs) && count($blogs) > 0)
                            <div class="row" id="load-data">

                                @php
                                    $blogId           = null;
                                    $blog_category_id = null;
                                @endphp
                                @foreach($blogs as $blog)
                                    @php
                                        $blogId = $blog->id;
                                        if($category_id !=0){
                                            $blog_category_id = $category_id;
                                        }else{
                                            $blog_category_id = 0;
                                        }

                                    @endphp
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                      <div class="blog">
                                            <span>
                                                <div class="blog_banner">
                                                    <img
                                                        src="{{asset('/uploads/blogs_images/thumbnails/'.$blog->image) }}">
                                                </div>
                                                <div class="blog_inner">
                                                    <div class="blog_short_detail">
                                                        <h3>{{ ucfirst($blog->name) }}</h3>
                                                        <p>{{ \Illuminate\Support\Str::limit($blog->summary,170) }}</p>
                                                    </div>
                                                    <div class="read_more_btn">
                                                        <a href="{{ route('blog.show',$blog->slug) }}"
                                                           class="read_more">Read More</a>
                                                    </div>
                                                </div>
                                            </span>
                                      </div>
                                    </div>
                                @endforeach
                                <div class="view_more col-12" id="remove-row">
                                    <a href="javascript:void(0)" class="view_more_btn fill-border-btn" id="btn-more"
                                       data-id="{{ $blogId }}" data-blog-category-id="{{ $blog_category_id }}"><span>Load More<i
                                                class="fa fa-angle-right"></i></span> </a>
                                </div>
                            </div>

                        @else
                            <div class="view_more col-12" id="remove-row">
                                <a class="view_more_btn fill-border-btn"><span>No Record Found</span> </a>
                            </div>
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4 col-12">
                <div class="blog_left_bar">

                @if(!empty($categories) && count($categories) > 0)
                    <!-- categories box -->
                        <div class="categories_box">
                        <span>
                            <div class="categories_box_inner">
                                <h2>Categories </h2>
                                <div class="categories">
                                    <ul>
                                        @foreach($categories as $category)

                                            <li>
                                                 <a href="{{ route('category.blogs',$category->slug) }}">
                                                     {{ ucfirst($category->name) }}
                                                     <span class="separator"></span>
                                                 </a>
                                            </li>



                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </span>
                        </div>
                @endif

                @if(!empty($featuredBlogs) && count($featuredBlogs) > 0)
                    <!-- featured blogs -->
                        <div class="featured_blogs_wrap">
                            <div class="featured_title">
                                <div class="title_decor_line">
                                    <h2>Featured Blogs </h2>
                                </div>
                            </div>
                            @foreach($featuredBlogs as $featuredBlog)
                                <div class="featured_blogs_listing">
                                    <div class="featured_blog">
                                        <span>
                                            <a href="{{ route('blog.show',$featuredBlog->slug) }}">
                                                <div class="f-blog-inner">
                                                <div class="featured_blog_img">
                                                    <img
                                                        src="{{asset('/uploads/blogs_images/thumbnails/'.$featuredBlog->image) }}">
                                                </div>
                                                <div class="featured_blog_info">
                                                    <h5>{{ ucfirst($featuredBlog->name) }}</h5>
                                                    <div class="publish_date">
                                                        <i class="fa fa-calendar"></i>
                                                        <p>{{$featuredBlog->created_at->format('F j, Y')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>

                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endif
                @if(!empty($tags) && count($tags) > 0)
                    <!-- hashtags wrapper -->
                        <div class="hashtags_wrap">
                            <div class="hastags_listing">

                                @foreach($tags as $tag)
                                    <div class="hashtag">
                                        #{{ ucfirst($tag->name) }}
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('frontend.components.contact')
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn-more', function () {
                var id = $(this).data('id');
                var blog_category_id = $(this).data('blog-category-id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url: '{{ route('blog.load.more') }}',
                    method: "POST",
                    data: {id: id, blog_category_id: blog_category_id, _token: "{{csrf_token()}}"},
                    dataType: "text",
                    success: function (data) {
                        if (data != '') {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        } else {
                            $('#btn-more').remove();
                        }
                    }
                });
            });
        });
    </script>
@endpush
