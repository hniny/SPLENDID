<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Item;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('sorting_no','desc')->paginate(10);
        $categories = Category::all();
        $category = Category::where('parent_id',0)->get();
        foreach ($category as $value) {
            $sub_category[$value['name']] = Category::select('name','id','parent_id')
                                                    ->where('parent_id',$value['id'])
                                                    ->get()
                                                    ->toArray();
            $sub_category[$value['name']]['id'] = $value['id'];
        }
        return view('la.product.index')->with('product',$product)
                                    ->with('cat',$categories)
                                    ->with('sub_category',$sub_category);
    }
    public function productsearch(Request $request)
    {
        $data = $request->all();
        if($request->catname == 0)
        {
            $productsearch = Product::select('products.*','categories.name')
                                ->join('categories','categories.id','=','products.category_id')
                                ->orderBy('sorting_no','desc')
                                ->get();
        }else{
            $productsearch = Product::select('products.*','categories.name')
                                ->join('categories','categories.id','=','products.category_id')
                                ->where('categories.id','=',$request->catname)
                                ->orderBy('sorting_no','desc')
                                ->get();
        }
       
        $categories = Category::all();
        $category = Category::where('parent_id',0)->get();
        foreach ($category as $value) {
            $sub_category[$value['name']] = Category::select('name','id','parent_id')
                                                    ->where('parent_id',$value['id'])
                                                    ->get()
                                                    ->toArray();
            $sub_category[$value['name']]['id'] = $value['id'];
        }
        
        return view('la.product.search_index')->with('productsearch',$productsearch)
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
        return view('la.product.create')->with('category',$category);
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
        $detail = $request->detail;
        $status = 0;
        
        if(isset($request->detail) && $request->detail <> null){
            foreach ($request->detail as $v) {
                if($v['access_field'] == null or $v['access_value'] == null){
                    $status++;
                }
            }
        }

        if ($status == 0) {
            $latest = Product::latest('sorting_no')->first();
            $latest_no = $latest->sorting_no+1;
            $product = new Product();
            $product->category_id = $request->child;
            $product->product_name = $request->name;
            $product->short_description = $request->sdesp;
            $product->description = $request->desp<>null?$request->desp:'';
            $product->price = $request->price;
            $product->rating = $request->rating;
            $product->new_item = $request->new_item;
            $product->hot_item = $request->hot_item;
            $product->sorting_no = $request->sorting_no<>null?$request->sorting_no:$latest_no;
            if(isset($request->promo)){
                $product->promo = $request->promo;

                $product->gift_item = isset($request->gift_item)?$request->gift_item:'off';
                $product->promo_price = $request->promo_price<>null?$request->promo_price:null;
                $product->short_description = isset($request->gift_item)?$request->sdesp:null;
            }else{
                $product->promo = 'off';
                $product->gift_item = 'off';
                $product->promo_price = null;
                $product->short_description = null;
            }

            if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $product->product_img = $file->getClientOriginalName();
            } else {
                $product->product_img = 'sample.png';
            }
            
            if($product->save()){
                if(isset($request->detail) && $request->detail <> null){
                    foreach ($request->detail as $val) {
                        $access = Item::create([
                            'item_name' => $val['access_field'],
                            'item_value' => $val['access_value'],
                            'product_id' => $product->id
                        ]);
                    }
                }
                // dd($access);
                return redirect('/admin/product');
            }
            else abort('500');
        } else {
            $category = Category::where('parent_id',0)->get();
            return view('la.product.create')->with('category',$category)
                                            ->with('status',$status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('la.product.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('parent_id',0)->get();
        $product = Product::find($id);
        $accitem = Item::where('product_id',$id)->get();
        // dd($accitem);
        $checked=$product->hot_item=='1'?'checked':'';
        return view('la.product.edit')->with('category',$category)
                                      ->with('product',$product)
                                      ->with('checked',$checked)
                                      ->with('accitem',$accitem);

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
        // dd($request->has('hot_item')?'1':'0');
        $status = 0;
        
        if(isset($request->item_details) && $request->item_details <> null){
            foreach ($request->item_details as $v) {
                if($v['item_name'] == null or $v['item_value'] == null){
                    $status++;
                }
            }
        }
        if ($status == 0) {
            $product = Product::find($id);
            $product->category_id = $request->child;
            $product->product_name = $request->name;
            $product->description = $request->desp<>null?$request->desp:'';
            $product->price = $request->price;
            $product->rating = $request->rating;
            $product->new_item = $request->new_item;
            $product->hot_item = $request->has('hot_item')? 1 : 0;
            $product->sorting_no = $request->sorting_no;

            if(isset($request->promo)){
                $product->promo = $request->promo;
                $product->gift_item = isset($request->gift_item)?$request->gift_item:'off';
                $product->promo_price = $request->promo_price<>null?$request->promo_price:null;
                $product->short_description = isset($request->gift_item)?$request->sdesp:null;
            }else{
                $product->promo = 'off';
                $product->gift_item = 'off';
                $product->promo_price = null;
                $product->short_description = null;
            }
            
            if ($request->hasFile('image')) {
                $file = $request->image;
                $destinationPath ='uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $product->product_img = $file->getClientOriginalName();
            } else {
                $product->product_img =$request->oldimage;
            }

            
            if($product->save()){
                if(isset($request->item_details)){
                    Item::where('product_id',$id)->forceDelete();

                    foreach ($request->item_details as $val) {
                        $access = Item::create([
                            'item_name' => $val['item_name'],
                            'item_value' => $val['item_value'],
                            'product_id' => $product->id
                        ]);
                    }
                }
                return redirect('/admin/product');
            }
            else abort('500');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product');
    }

    public function getCategory($id)
    {
        $category = Category::where('parent_id',$id)->get();
        return response()->json(['success'=>true,'categories'=>$category]);
    }
}
