<?php

namespace App\Http\Controllers\Admin;

use App\PcItem;
use App\PcCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PcItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcItem = PcItem::with('PcCategory');
        $pcItems = $pcItem->latest()->paginate(10);
        return view('la.pcItem.index',compact('pcItems',$pcItems));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pcCategories = PcCategory::pluck('cat_name','id');
        return view('la.pcItem.create',compact('pcCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
       $pcItems = new PcItem();
        $pcItems->item_name = $request->item_name;
        $pcItems->item_price = $request->item_price;
        $pcItems->pc_category_id = $request->pc_category_id;
        $pcItems->save();
        return redirect('/admin/pc_item')->with('success','Pc Item Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PcItem  $pcItem
     * @return \Illuminate\Http\Response
     */
    public function show(PcItem $pcItem,$id)
    {
        $pcItem = PcItem::find($id);
        return view('la.pcItem.show',compact('pcItem',$pcItem));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PcItem  $pcItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PcItem $pcItem,$id)
    {
        $pcItem = PcItem::find($id);
        $pcCategories = PcCategory::pluck('cat_name','id');
        return view('la.pcItem.edit',compact('pcItem',$pcItem,'pcCategories',$pcCategories));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PcItem  $pcItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pcItem = PcItem::find($id);
        $pcItem->item_name = isset($request->item_name)?$request->item_name:$pcItem->item_name;
        $pcItem->item_price = isset($request->item_price)?$request->item_price:$pcItem->item_price;
        $pcItem->pc_category_id = isset($request->pc_category_id)?$request->pc_category_id:$pcItem->pc_category_id;
        $pcItem->update();
        return redirect('/admin/pc_item')->with('success','Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PcItem  $pcItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PcItem $pcItem,$id)
    {
        $pcItem = PcItem::find($id);
        $pcItem->delete();
       return redirect('/admin/pc_item')->with('danger','Pc Item Deleted Successfullly!');
    }
}
