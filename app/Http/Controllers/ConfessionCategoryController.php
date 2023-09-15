<?php

namespace App\Http\Controllers;

use App\Models\ConfessionCategory;
use Illuminate\Http\Request;

class ConfessionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ConfessionCategory::latest()->paginate(20);

        return view('category/index', compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:confession_categories,title',
        ]);

        ConfessionCategory::create([
            'title' => ucwords($request->category),
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfessionCategory  $confessionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ConfessionCategory $confessionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfessionCategory  $confessionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfessionCategory $category)
    {
        return view('category/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfessionCategory  $confessionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfessionCategory $category)
    {
        $category->title = $request->category;
        $category->status = $request->status;

        $category->update();

        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfessionCategory  $confessionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfessionCategory $category)
    {
        $category->delete();

        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.index')->with($notification);
    }
}
