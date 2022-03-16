<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:viewdashboard')->only('create');
        $this->middleware('permission:viewdashboard')->only('index');
        $this->middleware('permission:viewdashboard')->only('edit');
        $this->middleware('permission:viewdashboard')->only('destroy');
        $this->middleware('permission:viewdashboard')->only('manageComplaint');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->has('category_photo_url_1')) {
            $path = $request->file('category_photo_url_1')->store('', 'public');
            $request->merge(['category_photo_url' => $path]);
        }

        Category::create($request->all());
        session()->flash('message', 'Category successfully created.');
        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->has('category_photo_url_1')) {
            $path = $request->file('category_photo_url_1')->store('', 'public');
            $request->merge(['category_photo_url' => $path]);
        }

        $category->update($request->all());
        session()->flash('message', 'Category successfully updated.');
        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete('/public/' . $category->category_photo_url);
        $category->delete();
        session()->flash('message', 'Category successfully deleted.');
        return to_route('category.index');
    }
}
