<?php

namespace App\Http\Controllers\Admin;

use App\Latestgame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LatestgameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('skfjlsaf');
        $data = Latestgame::paginate(10);
        // dd($data);
        return view('la.latestgames.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.latestgames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new Latestgame();
        $game->product_name = $request->product_name;
        $game->desp = $request->desp;
        $game->price = $request->price;
        $game->spec1 = isset($request->spec1)?$request->spec1:null;
        $game->spec2 = isset($request->spec2)?$request->spec2:null;
        $game->spec3 = isset($request->spec3)?$request->spec3:null;
        $game->spec4 = isset($request->spec4)?$request->spec4:null;
        $game->spec1_desp = isset($request->spec1_desp)?$request->spec1_desp:null;
        $game->spec2_desp = isset($request->spec2_desp)?$request->spec2_desp:null;
        $game->spec3_desp = isset($request->spec3_desp)?$request->spec3_desp:null;
        $game->spec4_desp = isset($request->spec4_desp)?$request->spec4_desp:null;
        if ($request->hasFile('product_image')) {
            $file = $request->product_image;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $game->product_image = $file->getClientOriginalName();
        } else {
            $game->product_image = 'sample.png';
        }
        if ($request->hasFile('bg_image')) {
            $file1 = $request->bg_image;
            $destinationPath1 ='uploads';
            $file1->move($destinationPath1,$file1->getClientOriginalName());
            $game->bg_image = $file1->getClientOriginalName();
        } else {
            $game->bg_image = 'sample.png';
        }
        if($game->save()){
            return redirect('/admin/latestgames');
        }else{
            abort('500');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Latestgame  $latestgame
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Latestgame::find($id);
        return view('la.latestgames.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Latestgame  $latestgame
     * @return \Illuminate\Http\Response
     */
    public function edit(Latestgame $latestgame,$id)
    {
        // dd('kfallafla');
        $data = Latestgame::find($id);
        return view('la.latestgames.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Latestgame  $latestgame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latestgame $latestgame,$id)
    {
        $latestgame = Latestgame::find($id);
        $latestgame->product_name = $request->product_name;
        $latestgame->desp = $request->desp;
        $latestgame->price = $request->price;
        $latestgame->spec1 = isset($request->spec1)?$request->spec1:null;
        $latestgame->spec2 = isset($request->spec2)?$request->spec2:null;
        $latestgame->spec3 = isset($request->spec3)?$request->spec3:null;
        $latestgame->spec4 = isset($request->spec4)?$request->spec4:null;
        $latestgame->spec1_desp = isset($request->spec1_desp)?$request->spec1_desp:null;
        $latestgame->spec2_desp = isset($request->spec2_desp)?$request->spec2_desp:null;
        $latestgame->spec3_desp = isset($request->spec3_desp)?$request->spec3_desp:null;
        $latestgame->spec4_desp = isset($request->spec4_desp)?$request->spec4_desp:null;
        if ($request->hasFile('product_image')) {
            $file = $request->product_image;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $latestgame->product_image = $file->getClientOriginalName();
        } 
        if ($request->hasFile('bg_image')) {
            $file1 = $request->bg_image;
            $destinationPath1 ='uploads';
            $file1->move($destinationPath1,$file1->getClientOriginalName());
            $latestgame->bg_image = $file1->getClientOriginalName();
        } 
    
        $latestgame->save();
    
        return redirect()->route('latestgames.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Latestgame  $latestgame
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Latestgame::findOrFail($id);
        $data->delete();
        return redirect()->route('latestgames.index');
    
    }
}
