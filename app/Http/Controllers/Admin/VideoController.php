<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Video::paginate(10);
       return view('la.video.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->has('top'));
        $data = Video::create($request->except('_token'));
        if($data){
            return redirect('/admin/video');
        }else{
            return redirect(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Video::find($id);
        $checked=$data->top=='on'?'checked':'';
        return view('la.video.show',compact('data','checked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video,$id)
    {
        $data = Video::find($id);
        $checked=$data->top=='on'?'checked':'';
        return view('la.video.edit')->with('data',$data)->with('checked',$checked);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        // dd($request->all());
        $video = Video::find($request->id);
        
        $video->title = $request->title;
        $video->link = $request->link;
        $video->top = $request->has('top')?'on':'off';
        $video->save();
        return redirect('/admin/video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Video::findOrFail($id);
        $data->delete();
        return redirect('/admin/video');
    }
}
