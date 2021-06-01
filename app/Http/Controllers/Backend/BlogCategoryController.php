<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('backend.category-blogs.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.category-blogs.create');

    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('admin.category-blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Category created successfully.'
            ]);

    }

    public function edit($id)
    {
        $blog_category = Category::find($id);
        return view('backend.category-blogs.edit', compact('blog_category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.category-blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Category updated successfully.'
            ]);

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (count($category->blogs) > 1) {
            foreach ($category->blogs as $blog) {
                $this->checkAndDeleteBlog($blog, $id);
            }
        } else {
            if (count($category->blogs) > 0) {
                foreach ($category->blogs as $blog) {
                    $this->checkAndDeleteBlog($blog, $id);
                }
            }
        }
        $category->delete();
        return redirect()->route('admin.category-blogs.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Category has been deleted'
            ]);
    }

    private function checkAndDeleteBlog($blog, $id)
    {
        if (count($blog->categories) > 1) {
            foreach ($blog->categories as $cat) {
                if ($cat->id == $id) {
                    BlogCategory::where('category_id', $id)->delete();
                }
            }
        } else {
            $blog->tags()->detach();
            $blog->categories()->detach();
            $blog->delete();
        }
    }
}
