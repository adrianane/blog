<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class SitemapController extends Controller
{
    
    public function index(Request $r)
    {
       
        $posts = Post::orderBy('id','desc')->where('status', '1')->get();
        $categories = Category::orderBy('id','desc')->where('status', '1')->get();

        return response()->view('frontend.sitemap', ['posts' => $posts, 'categories' => $categories])
          ->header('Content-Type', 'text/xml');
    }
}