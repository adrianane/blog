<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\AddCategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryFormRequest $request): RedirectResponse
    {
        $dataRequest = $request->validated();
        $category = new Category();
        $category->name = $dataRequest['name'];
        $category->slug = Str::slug($dataRequest['slug']);
        $category->description = $dataRequest['description'];
        /*
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }
        */
        $category->meta_title = $dataRequest['meta_title'];
        $category->meta_description = $dataRequest['meta_description'];
        $category->meta_keyword = $dataRequest['meta_keyword'];
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return redirect('admin/categories')->with('message', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.category.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryFormRequest  $request, string $id): RedirectResponse
    {
        $dataRequest = $request->validated();
        $category = Category::find($id);

        $category->name = $dataRequest['name'];
        $category->slug = Str::slug($dataRequest['slug']);
        $category->description = $dataRequest['description'];
        $category->meta_title = $dataRequest['meta_title'];
        $category->meta_description = $dataRequest['meta_description'];
        $category->meta_keyword = $dataRequest['meta_keyword'];
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return redirect('admin/categories')->with('message', 'Category edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin/categories')->with('message', 'Category deleted!');
    }
}
