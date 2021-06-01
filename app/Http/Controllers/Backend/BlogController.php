<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.blogs.create', compact('categories', 'tags'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'is_featured' => 'required',
            'is_order' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'summary' => 'required',
            'description' => 'required',

            "categories" => "required|array",
            "tags" => "required|array",
        ], [
            'categories.required' => 'At Least One Category is required.',
            'tags.required' => 'At Least One Tag is required.'
        ]);
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $blog_image = $name;


            // for save original image
            $ImageUpload = Image::make($image->getRealPath());
            $originalPath = public_path('/uploads/blogs_images/');
            // prevent possible upsizing
//            $ImageUpload->resize(900, 506);
            $ImageUpload->save($originalPath . $name);

            // for save thumnail image
            $ImageUploadThumbnail = Image::make($image->getRealPath());
            $thumbnailPath = public_path('/uploads/blogs_images/thumbnails/');
            // prevent possible upsizing
            $ImageUploadThumbnail->resize(450, 253);
            $ImageUploadThumbnail = $ImageUploadThumbnail->save($thumbnailPath . $name);


        } else {
            $blog_image = null;
        }

        $description=$request->input('description');
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/uploads/blogs_images" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();


        $blog = Blog::create([
            'name' => $request->name,
            'author_name' => $request->author_name,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'description' => $request->description,
            'image' => $blog_image,
            'is_featured' => $request->is_featured,
            'is_order' => $request->is_order,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        $blog->tags()->sync($request->tags);
        $blog->categories()->sync($request->categories);
        return redirect()->route('admin.blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Blog created successfully.'
            ]);

    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_featured' => 'required',
            'is_order' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            "categories" => "required|array",
            "tags" => "required|array",
        ], [
            'categories.required' => 'At Least One Category is required.',
            'tags.required' => 'At Least One Tag is required.'
        ]);
        $blog = Blog::find($id);
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $blog_image = $name;


            // for save original image
            $ImageUpload = Image::make($image->getRealPath());
            $originalPath = public_path('/uploads/blogs_images/');
            // prevent possible upsizing
            $ImageUpload->resize(900, 506);
            $ImageUpload->save($originalPath . $name);

            // for save thumnail image

            $ImageUploadThumbnail = Image::make($image->getRealPath());
            $thumbnailPath = public_path('/uploads/blogs_images/thumbnails/');
            // prevent possible upsizing
            $ImageUploadThumbnail->resize(450, 253);
            $ImageUploadThumbnail = $ImageUploadThumbnail->save($thumbnailPath . $name);
        } else {
            $blog_image = $blog->image;
        }


        $description=$request->input('description');
        $dom = new \DomDocument();
        libxml_use_internal_errors(false);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | # Make sure no extra BODY
            LIBXML_HTML_NODEFDTD |  # or DOCTYPE is created
            LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING        # or warnings about prefixes.
        );
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/uploads/blogs_images" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();


        $blog->update([
            'name' => $request->name,
            'author_name' => $request->author_name,
            'slug' => $request->slug,
            'summary' => $request->summary,
            'description' => $request->description,
            'image' => $blog_image,
            'is_featured' => $request->is_featured,
            'is_order' => $request->is_order,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        $blog->tags()->sync($request->tags);
        $blog->categories()->sync($request->categories);
        return redirect()->route('admin.blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Blog updated successfully.'
            ]);

    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->tags()->detach();
        $blog->categories()->detach();
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Blog has been deleted'
            ]);
    }
}
