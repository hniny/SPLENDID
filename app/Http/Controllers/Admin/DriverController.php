<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Driver::paginate(10);
        return view('la.driver.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.driver.create');
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
        $game = new Driver();
        $game->title = $request->title;
        $game->down_link = $request->down_link;
        if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $game->image = $file->getClientOriginalName();
            } else {
                $game->image = 'sample.png';
            }
        if($game->save()){
            return redirect('/admin/driver_download');
        }else{
            abort('500');
        }
        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver,$id)
    {
        $data = Driver::find($id);
        return view('la.driver.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $data = Driver::find($id);
        $data->title = $request->title;
        $data->down_link = $request->down_link;
        
        if ($request->hasFile('image')) {
            $file = $request->image;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $data->image = $file->getClientOriginalName();
        } else {
            $data->image =$request->oldimage;
        }
        $data->save();
        return redirect('/admin/driver_download')->with('info', 'Data Updated successfully.');
    }
    // public function update(Request $request, Driver $driver,$id)
    // {
    //     $image_name = $request->hidden_image;
    //     $image = $request->file('image');
    //     if($image != '')
    //     {
            
    //         $image_name = rand() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads'), $image_name);
    //     }
        

    //     $form_data = array(
    //         'title'       =>   $request->title,

    //         'down_link'             =>      $request->down_link,
            
    //         'image'         =>  $image_name
    //     );

    //     Driver::whereId($id)->update($form_data);
    //     return redirect('/admin/driver_download')->with('info', 'Data Updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Driver::find($id);
        $data->delete();
        return redirect('/admin/driver_download');
    }
}
