<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Partner::paginate(10);
        return view('la.partner.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.partner.create');
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
        $partner = new Partner();
        $partner->partner_name = $request->partner_name;
        $partner->partner_link = $request->partner_link;
        if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $partner->image = $file->getClientOriginalName();
            } else {
                $partner->image = 'sample.png';
            }
        if($partner->save()){
            return redirect('/admin/partnership')->with('success', 'Data Added successfully.');
        }else{
            abort('500');
        }
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);
        return view('la.partner.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner,$id)
    {
        $data = Partner::find($id);
        return view('la.partner.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner,$id)
    {
        //  dd($request->all());
        $partner = Partner::find($id);
        $partner->partner_name = $request->partner_name;
        $partner->partner_link = $request->partner_link;
        if (isset($request->image)) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $partner->image = $file->getClientOriginalName();
            } 
            
        if($partner->save()){
            return redirect('/admin/partnership')->with('success', 'Data Added successfully.');
        }else{
            abort('500');
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner,$id)
    {
        $data = Partner::find($id);
        $data ->delete();
        return redirect('/admin/partnership')->with('danger', 'Data Deleted successfully.');
    }
}
