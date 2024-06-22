<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Content::paginate(10);
        return view('la.contents.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content();
        $content->title = $request->title;
        $content->content_description = $request->content_description;
        if ($request->hasFile('content_image')) {
                $file = $request->content_image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $content->content_image = $file->getClientOriginalName();
            } else {
                $content->content_image = 'sample.png';
            }
        if($content->save()){
            return redirect('/admin/product_content')->with('success', 'Data Added successfully.');
        }else{
            abort('500');
        }
        
    }
        

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Content::find($id);
        return view('la.contents.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content,$id)
    {
        $data = Content::find($id);
        return view('la.contents.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $data =Content::find($id);
        $data->title = $request->title;
        $data->content_description = $request->content_description;
        if ($request->hasFile('content_image')) {
                $file = $request->content_image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $data->content_image = $file->getClientOriginalName();
            }
            $data->save();
            return redirect('/admin/product_content')->with('info', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content,$id)
    {
        $data = Content::find($id);
        $data ->delete();
        return redirect('/admin/product_content');
    }
}