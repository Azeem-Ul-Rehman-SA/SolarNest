<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::orderBy('id', 'asc')->limit(2)->get();
        $featuredBlogs = Blog::where('is_featured', 'yes')->where('is_order', '!=', 0)->orderBy('id', 'asc')->limit(3)->get();
        if ($blogs->count() > 0) {
            $categories = Category::limit(10)->get();
        } else {
            $categories = [];
        }
        $tags = Tag::all();
        $category_id = 0;

        return view('frontend.pages.blogs.blog', compact('blogs', 'categories', 'featuredBlogs', 'tags', 'category_id'));
    }

    public function getBlog($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        $featuredBlogs = Blog::where('is_featured', 'yes')->where('is_order', '!=', 0)->orderBy('id', 'asc')->limit(3)->get();
        return view('frontend.pages.blogs.blog-detail', compact('blog', 'featuredBlogs'));
    }

    public function categoryBlog($slug)
    {
        $category_id = Category::where('slug', $slug)->first()->id;
        $blogs = Blog::orderBy('id', 'asc')->whereHas('categories', function ($q) use ($category_id) {
            $q->where('id', $category_id);
        })->limit(2)->get();
        $featuredBlogs = Blog::where('is_featured', 'yes')->where('is_order', '!=', 0)->orderBy('id', 'asc')->limit(3)->get();
        if ($blogs->count() > 0) {
            $categories = Category::limit(10)->get();
        } else {
            $categories = [];
        }
        $tags = Tag::all();


        return view('frontend.pages.blogs.blog', compact('blogs', 'categories', 'featuredBlogs', 'tags', 'category_id'));

    }

    public function loadBlogAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        $blog_category_id = $request->blog_category_id;
        if ($blog_category_id != 0) {
            $blogs = Blog::where('id', '>', $id)->orderBy('id', 'asc')->whereHas('categories', function ($q) use ($blog_category_id) {
                $q->where('id', $blog_category_id);
            })->limit(2)->get();
        } else {
            $blogs = Blog::where('id', '>', $id)->orderBy('id', 'asc')->limit(2)->get();
        }


        if (!$blogs->isEmpty() && ($blogs->count() > 0)) {
            $blogId = null;
            foreach ($blogs as $blog) {
                $url = url('/uploads/blogs_images/thumbnails/' . $blog->image);


                $blogId = $blog->id;
                $output .= ' <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                   <div class="blog">
                                      <span>
                                           <div class="blog_banner">
                                                <img  src="' . $url . '">
                                           </div>
                                           <div class="blog_inner">
                                               <div class="blog_short_detail">
                                                    <h3>' . ucfirst($blog->name) . '</h3>
                                                    <p>' . \Illuminate\Support\Str::limit($blog->summary, 170) . '</p>
                                               </div>
                                               <div class="read_more_btn">
                                                    <a href="' . route('blog.show', $blog->slug) . '" class="read_more">Read More</a>
                                               </div>
                                           </div>
                                      </span>
                                  </div>
                            </div>';
            }
            $output .= '<div class="view_more col-12" id="remove-row">
                            <a  href="javascript:void(0)" class="view_more_btn fill-border-btn" id="btn-more" data-id="' . $blogId . '"  data-blog-category-id="' . $blog_category_id . '"><span>Learn More<i
                                class="fa fa-angle-right"></i></span> </a>
                        </div>';

            echo $output;
        }
    }

}
