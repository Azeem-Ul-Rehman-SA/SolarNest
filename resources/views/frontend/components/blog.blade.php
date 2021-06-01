<div class="blogs_listing_wrapper" style="background-image: url({{ asset('frontend/images/sola-gr-bg.png') }});">
    <div class="container">
        <div class="blogs_listing_inner" style="background-image: url({{ asset('frontend/images/Blogsback.png') }});">
            <div class="title">
                <h3>Learn about the</h3>
                <h2>Technology</h2>
            </div>
            <div class="blogs_listing">
                <div class="row content-center">
                    @if(!empty($featuredBlogs) && count($featuredBlogs) > 0)
                        @foreach($featuredBlogs as $blog)
                            <div class="col-md-8 col-xl-4 col-lg-4">
                                <div class="blog">
                            <span>
                                <div class="blog_banner">
                                    <img class="lozad" data-src="{{ asset('/uploads/blogs_images/'.$blog->image) }}">
                                </div>
                                <div class="blog_inner">
                                    <div class="blog_short_detail">
                                        <h3>{{ ucfirst($blog->name) }}</h3>

                                        <span class="author_name">BY: {{ $blog->author_name }}</span>
                                         <p>{{ \Illuminate\Support\Str::limit($blog->summary,170) }}</p>

                                    </div>
                                    <div class="read_more_btn">
                                        <a class="read_more"
                                        href="{{ route('blog.show',$blog->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="view_more ">
                    <a class="view_more_btn fill-border-btn" href="{{ route('blog') }}"><span>Load More<i
                                class="fa fa-angle-right"></i></span> </a>
                </div>
            </div>
        </div>
    </div>
</div>
