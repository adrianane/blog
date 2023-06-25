<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $posts = Post::where('status', 1)->paginate(15);
        
        return view('frontend.index')->with([
                'posts' => $posts,
                'categories' => $categories
            ]);;
    }

    public function viewCategoryPost($categorySlug)
    {
        $categories = Category::where('status', 1)->get();

        $category = Category::where('slug', $categorySlug)
        ->where('status', 1)->first();
        if ($category) {
            $posts = Post::where('category_id', $category->id)
            ->where('status', 1)->paginate(15);

            return view('frontend.post.index')->with([
                    'categories' => $categories,
                    'posts' => $posts,
                    'category' => $category
            ]);
        } else {
            return redirect('/');
        }
        return view('frontend.index');
    }

    public function viewPostBySlug($categorySlug, $postSlug)
    {

        $categories = Category::where('status', 1)->get();

        $category = Category::where('slug', $categorySlug)
        ->where('status', 1)->first();
        if ($category) {
             $post = Post::where('slug', $postSlug)->where('status', 1)
             ->where('category_id', '=', $category->id)
             ->first();

            $latestPosts = Post::where('status', 1)->latest()->get()->take(5);

            return view('frontend.post.show')->with([
                'post' => $post,
                'categories' => $categories,
                'latestPosts' => $latestPosts
            ]);
        } else {
            return redirect('/');
        }
    }
}
