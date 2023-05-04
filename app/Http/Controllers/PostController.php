<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishedCategories = Category::where('status', 1)->get();

        return view('posts.create')->with('categories', $publishedCategories);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  PostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $dataRequest = $request->validated();
        $post = new Post();

        $post->title = $dataRequest['title'];
        $post->body = $dataRequest['body'];
        $post->slug = Str::slug($dataRequest['slug']);
        $post->meta_title = $dataRequest['meta_title'];
        $post->meta_description = $dataRequest['meta_description'];
        $post->meta_keyword = $dataRequest['meta_keyword'];
        $post->status = $request->status == 'true' ? 1 : 0;

        $post->user_id = auth()->user()->id;
        $post->category_id = $dataRequest['category_id'];

        $post->save();

        return redirect('/admin/posts')->with('message', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentPost = Post::find($id);
        return view('posts.show')->with('post',  $currentPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('status', 1)->get();

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('admin/posts')->with('error', 'Unauthorized page!');
        }

        return view('posts.edit')->with(
            [
                'post' => $post, 
                'categories' => $categories
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        $dataRequest = $request->validated();

        $post = Post::find($id);
        $post->title = $dataRequest['title'];
        $post->body = $dataRequest['body'];
        $post->slug = Str::slug($dataRequest['slug']);
        $post->meta_title = $dataRequest['meta_title'];
        $post->meta_description = $dataRequest['meta_description'];
        $post->meta_keyword = $dataRequest['meta_keyword'];
        $post->status = $request->status == 'true' ? 1 : 0;
        $post->category_id = $dataRequest['category_id'];

        $post->save();
    
        return redirect('/admin/posts')->with('message', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/admin/posts')->with('error', 'Unauthorized page!');
        }

        $post->delete();

        return redirect('/admin/posts')->with('message', 'Post deleted!');
    }
}
