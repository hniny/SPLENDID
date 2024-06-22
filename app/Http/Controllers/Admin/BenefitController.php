<?php

namespace App\Http\Controllers\Admin;

use App\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Benefit::paginate(10);
        return view('la.benefit.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $benefit = new Benefit();
        $benefit->title = $request->title;
        $benefit->description = $request->description;
        if ($request->hasFile('card1')) {
            $file = $request->card1;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $benefit->card1 = $file->getClientOriginalName();
        } else {
            $benefit->card1 = 'sample.png';
        }

        if ($request->hasFile('card2')) {
            $file = $request->card2;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $benefit->card2 = $file->getClientOriginalName();
        } else {
            $benefit->card2 = 'sample.png';
        }

        $benefit->save();
        if($benefit){
            return redirect('/admin/benefit');
        }else{
            abort('500');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit,$id)
    {
        // dd($id);
        $data = Benefit::find($id);
        return view('la.benefit.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = Benefit::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

        if ($request->hasFile('card1')) {
            $file = $request->card1;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $data->card1 = $file->getClientOriginalName();
        } else {
            $data->card1 =$request->oldimage1;
        }

        if ($request->hasFile('card2')) {
            $file = $request->card2;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $data->card2 = $file->getClientOriginalName();
        } else {
            $data->card2 =$request->oldimage2;
        }

        if($data->save()){
            return redirect('/admin/benefit');
        }else{
            abort('500');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Benefit::findOrFail($id);
        $data->delete();
        return redirect('/admin/benefit');
    }
}
