<?php

namespace App\Http\Controllers\Admin;

use App\PcCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PcCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcCategory = new PcCategory();
        $pcCategories = $pcCategory->paginate(10);
        return view('la.pc_category.index',['pcCategories' => $pcCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.pc_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,PcCategory $pcCategory)
    {
        
        $pcCategory->cat_name = $request->cat_name;
        $pcCategory->save();
        return redirect('/admin/pc_category')
                        ->with('success','category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PcCategory  $pcCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PcCategory $pcCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PcCategory  $pcCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pcCategory = PcCategory::find($id);
        return view('la.pc_category.edit',['pcCategory' => $pcCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PcCategory  $pcCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $pcCategory = PcCategory::find($id);
        $pcCategory->cat_name = $request->cat_name;
        
        $pcCategory->update();
        // dd($pcCategory);
        return redirect('/admin/pc_category')
                        ->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PcCategory  $pcCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PcCategory $pcCategory,$id)
    {
        $pcCategory = PcCategory::find($id);
        $pcCategory->delete();
        return redirect('/admin/pc_category')
                        ->with('delete','Category deleted successfully!');
    }
}
