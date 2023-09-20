<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use App\Models\ConfessionCategory;
use Illuminate\Http\Request;

class ConfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confessions = Confession::latest()->paginate(30);
        
        return view('confession/index', compact('confessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ConfessionCategory::orderBy('title', 'ASC')->whereStatus('Active')->get();
        
        return view('confession/create', compact('categories'));
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
            'confession' => 'required',
        ]);
        
        Confession::create([
            'category_id' => $request->category_id,
            'body' => ucfirst($request->confession),
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);
        
        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('confession.index')->with($notification);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Confession  $confession
     * @return \Illuminate\Http\Response
     */
    public function show(Confession $confession)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Confession  $confession
     * @return \Illuminate\Http\Response
     */
    public function edit(Confession $confession)
    {
        $categories = ConfessionCategory::orderBy('title', 'ASC')->whereStatus('Active')->get();
        
        return view('confession/edit', compact('categories', 'confession'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Confession  $confession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confession $confession)
    {
        $confession->category_id = $request->category_id;
        $confession->body = $request->confession;
        $confession->status = $request->status;

        $confession->update();

        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];

        return redirect()->route('confession.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Confession  $confession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confession $confession)
    {
        $confession->delete();

        $notification = [
            'message' => 'Successful',
            'alert-type' => 'success'
        ];

        return redirect()->route('confession.index')->with($notification);
    }
}
