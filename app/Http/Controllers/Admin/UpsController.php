<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ups;
use Illuminate\Http\Request;


class UpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ups::paginate(10);
        return view('la.ups_warranty.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.ups_warranty.create');
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
            'product_name'    =>  'required',
            'service'     =>  'required',
            'image'         =>  'required|image'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $new_name);
        $form_data = array(
            'product_name'       =>   $request->product_name,
            'service'             =>      $request->service,
            'image'            =>   $new_name
        );

        Ups::create($form_data);

        return redirect('/admin/ups_warranty')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function show(Ups $ups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function edit(Ups $ups,$id)
    {
        $data = Ups::find($id);
        return view('la.ups_warranty.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ups $ups,$id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);
        }
        

        $form_data = array(
            'product_name'       =>   $request->product_name,

            'service'             =>      $request->service,
            
            'image'         =>  $image_name
        );

        Ups::whereId($id)->update($form_data);
        return redirect('/admin/ups_warranty')->with('info', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ups $ups,$id)
    {
        $data = Ups::find($id);
        $data ->delete();
        return redirect('/admin/ups_warranty')->with('danger', 'Data Added successfully.');
    }
}
