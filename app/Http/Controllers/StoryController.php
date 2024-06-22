<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
class StoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $story = Story::all();
        return view('la.story.index')->with('story',$story);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('la.story.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $story = new Story();
        $story->title = $request->title;
        $story->description = $request->desp;
        $story->save();
        return redirect('/admin/story');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $story = Story::find($id);
        return view('la.story.show')->with('story',$story);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $story = Story::find($id);
        return view('la.story.edit')->with('story',$story);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $story = Story::find($id);
        $story->title = $request->title;
        $story->description = $request->desp;
        $story->save();
        return redirect('/admin/story');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();
        return redirect('/admin/story');
    }
}
