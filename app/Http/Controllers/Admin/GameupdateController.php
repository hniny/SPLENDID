<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gameupdate;

class GameupdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gameupdate::paginate(10);
        return view('la.gameupdate.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.gameupdate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $game = new Gameupdate();
        $game->title = $request->title;
        $game->game_resource = $request->game_resource;
        $game->soon = isset($request->soon)?1:0;
        $game->playform1 = isset($request->window)?1:0;
        $game->playform2 = isset($request->mac)?1:0;
        $game->playform3 = isset($request->playstation)?1:0;
        $game->genre = $request->genre;
        $game->description = $request->description;
        if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $game->image = $file->getClientOriginalName();
            } else {
                $game->image = 'sample.png';
            }
        if($game->save()){
            return redirect('/admin/gameupdates');
        }else{
            abort('500');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gameupdate  $gameupdate
     * @return \Illuminate\Http\Response
     */
    public function show(Gameupdate $gameupdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gameupdate  $gameupdate
     * @return \Illuminate\Http\Response
     */
    public function edit(Gameupdate $gameupdate,$id)
    {
        // dd($id);
        $data = Gameupdate::find($id);
        return view('la.gameupdate.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gameupdate  $gameupdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = Gameupdate::find($id);
        $data->title = $request->title;
        $data->game_resource = $request->game_resource;
        $data->soon = isset($request->soon)?1:0;
        $data->playform1 = isset($request->window)?1:0;
        $data->playform2 = isset($request->mac)?1:0;
        $data->playform3 = isset($request->palystation)?1:0;
        $data->genre = $request->genre;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $data->image = $file->getClientOriginalName();
        } else {
            $data->image =$request->oldimage;
        }
        $data->save();
        return redirect('/admin/gameupdates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gameupdate  $gameupdate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gameupdate::find($id);
        $data->delete();
        return redirect('/admin/gameupdates');
    }
}
