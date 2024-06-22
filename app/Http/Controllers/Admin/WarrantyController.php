<?php

namespace App\Http\Controllers\Admin;

use App\Warranty;
use App\Category;
use App\Item;
use App\WarrantyDetail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warranty = Warranty::paginate(10);
        // $data = WarrantyDetail::paginate(10);
        $categories = Category::all();
        $category = Category::where('parent_id',0)->get();
        foreach ($category as $value) {
            $sub_category[$value['name']] = Category::select('name','id','parent_id')
                                                    ->where('parent_id',$value['id'])
                                                    ->get()
                                                    ->toArray();
            $sub_category[$value['name']]['id'] = $value['id'];
        }
        return view('la.warrantyinfo.index')->with('warranty',$warranty)
                                        ->with('cat',$categories)
                                        ->with('sub_category',$sub_category);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id',0)->get();
        return view('la.warrantyinfo.create')->with('category',$category);
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
        $warranty = new Warranty();
        $warranty->category_id = $request->parent_id;
        $warranty->product_name = $request->product_name;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $destinationPath ='uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $warranty->image = $file->getClientOriginalName();
        } else {
            $warranty->image = 'sample.png';
        }
       
        // dd($detail);
            if($warranty->save()){
                if(isset($request->detail) && $request->detail <> null){
                    foreach ($request->detail as $val) {
                        $access = WarrantyDetail::create([
                            'warrantydetail_name' => $val['access_field'],
                            'warrantydetail_value' => $val['access_value'],
                            'warranty_id' => $warranty->id
                        ]);
                    }
                    
                }
                return redirect('/admin/warrantyinfo');
            }
            else abort('500');
        
    }


        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Warranty::find($id);
        $detail = WarrantyDetail::where('warranty_id',$id)->get();
        // dd($detail);
        return view('la.warrantyinfo.show',compact('data','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Warranty::find($id);
        $categories=Category::all();
        $detail = WarrantyDetail::where('warranty_id',$id)->get();
        // dd($detail);
        return view('la.warrantyinfo.edit')->with('data',$data)
                                        ->with('detail',$detail)
                                        ->with('categories',$categories);
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

        // dd($request->all());
        $status = 0;
        
        if(isset($request->item_details) && $request->item_details <> null){
            foreach ($request->item_details as $v) {
                if($v['warrantydetail_name'] == null or $v['warrantydetail_value'] == null){
                    $status++;
                }
            }
        }
        if ($status == 0) {
            $warranty = Warranty::find($id);
            $warranty->category_id = $request->parent_id;
            $warranty->product_name = $request->product_name;
            // dd($warranty->product_name);
            
            if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $warranty->image = $file->getClientOriginalName();
            } else {
                $warranty->image =$request->oldimage;
            }
            
            
            if($warranty->save()){
                if(isset($request->item_details)){
                    // dd($request->item_details);
                    WarrantyDetail::where('warranty_id',$id)->forceDelete();
                   
                    foreach ($request->item_details as $val) {
                        $access = WarrantyDetail::create([
                            'warrantydetail_name' => $val['warrantydetail_name'],
                            'warrantydetail_value' => $val['warrantydetail_value'],
                            'warranty_id' => $warranty->id
                        ]);
                    }
                }
                return redirect('/admin/warrantyinfo');
            }
            else abort('500');
    } else {
            return back();
        }

       
        // $detail = Warranty::whereId($id)->update($form_data);
        
        // dd($detail);

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warranty = Warranty::find($id);
        $warranty->delete();
        return redirect('/admin/warrantyinfo');
        
    }
}
