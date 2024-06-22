<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Country;
use App\Payment;
use App\Sale;
use App\Customer;
use App\Item;
use App\Video;
use App\Benefit;
use App\Gameupdate;
use App\Latestgame;
use App\Laptop;
use App\Ups;
use App\Driver;
use App\Content;
use App\Partner;
use App\Error;
use App\Warranty;
use App\WarrantyDetail;
use App\PcCategory;
use App\Rate;
use Mail;
use ShoppingCart;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
    public  $menu_categories;
    public function __construct()
    {
    //   $this->middleware('auth');
       $this->menu_categories = Category::all();
    //    dd($this->menu_categories);
    }
    public function index()
    {
        $product = Product::all();
        $promotion = Product::where('promo','on')
                            ->orderBy('id','desc')
                            ->take(6)
                            ->get();
        // dd($promotion);
        $hot_items = Product::where('hot_item',1)->get();
        // dd($hot_item);
        
        return view('splendid.index')->with('product',$product)
                                     ->with('menu_categories',$this->menu_categories)
                                     ->with('promotion',$promotion)
                                     ->with('hot_items',$hot_items);
    }

    // public function video() {
    //     $top = Video::where('top','on')->orderBy('updated_at','desc')->first();
    //     // dd($video);
    //     $videos = Video::where('id','<>',$top->id)->get();
    //     return view('splendid.video')->with('top',$top)
    //                                 ->with('menu_categories',$this->menu_categories)
    //                                 ->with('videos',$videos);
    // }

    public function gameUpdate() {
        // dd('hello');
        $video = Video::take(2)->get();
        $soon = Gameupdate::where('soon',1)->latest()->first();

        $latest = Gameupdate::latest()->get();
        // dd($soon);
        $data = Gameupdate::latest()->paginate(20);
        return view('splendid.game_update')->with('menu_categories',$this->menu_categories)
                                        ->with('video',$video)
                                        ->with('soon',$soon)
                                        ->with('data',$data)
                                        ->with('latest',$latest);
    }

    public function gameUpdateDetail($id) {
    //    dd('djslk');
    // dd($id);
    $data = Gameupdate::find($id);
    // dd($data);
        return view('splendid.game_update_detail')->with('menu_categories',$this->menu_categories)
                                       ->with('data',$data);
    }



    public function latestGaming() {
        $data = Latestgame::all();
        return view('splendid.latest_gaming')->with('menu_categories',$this->menu_categories)
                                            ->with('data',$data);
    }

    public function latestGamingDetail($id) {
        
        $data = Latestgame::find($id);
        return view('splendid.latest_gaming_detail', compact('data'))->with('menu_categories',$this->menu_categories)
                                            ;
    }

    public function outlet() {
        return view('splendid.outlets')->with('menu_categories',$this->menu_categories);
    }

    public function benifit() {
        $data = Benefit::all();
        return view('splendid.benifit')->with('data',$data)
                                    ->with('menu_categories',$this->menu_categories);
    }

    public function event() {
        return view('splendid.event')->with('menu_categories',$this->menu_categories);
    }

    public function event1() {
        return view('splendid.event1')->with('menu_categories',$this->menu_categories);
    }

    public function event2() {
        return view('splendid.event2')->with('menu_categories',$this->menu_categories);
    }

    public function event3() {
        return view('splendid.event3')->with('menu_categories',$this->menu_categories);
    }

    public function event4() {
        return view('splendid.event4')->with('menu_categories',$this->menu_categories);
    }
    

    public function video() {
        $top = Video::where('top','on')->orderBy('updated_at','desc')->first();
        // dd($video);
        $videos = Video::where('id','<>',$top->id)->get();
        return view('splendid.video')->with('top',$top)
                                    ->with('menu_categories',$this->menu_categories)
                                    ->with('videos',$videos);
    }

    

    public function warranty() {
        $data = Warranty::all();
        $categories=Category::where('parent_id',0)->get();
        // dd($categories);
        foreach ($categories as $key => $value) {
            $sub_categories[$value['name']] = Warranty::select('id','category_id','product_name')->where('category_id',$value['id'])->get()->toArray();
        }
        // dd($sub_categories);
        // $detail = WarrantyDetail::where('warranty_id',$id)->get();
        return view('splendid.warranty')->with('menu_categories',$this->menu_categories)
                                        ->with('data',$data)
                                        ->with('sub_categories',$sub_categories)
                                        ->with('categories',$categories);
    }

    public function warrantyDetail($key,$category_id) {
        // dd($category_id);
        $data = Warranty::where('category_id', $category_id)->get();
        // $detail = WarrantyDetail::where('warranty_id',$category_id)->get();
        // dd($detail);
        return view('splendid.warrantyDetail')
        ->with('menu_categories',$this->menu_categories)
        ->with('data',$data);
    }

    public function warrantyUps() {
        $data = Ups::all();
        return view('splendid.ups_warranty')->with('menu_categories',$this->menu_categories)
                                            ->with('data',$data);
    }

    public function errorQa() {
        $data = Error::all();
        return view('splendid.error_qa')->with('menu_categories',$this->menu_categories)
                                            ->with('data',$data);
    }

    public function driver() {
        $data = Driver::paginate(10);
        return view('splendid.driver')->with('menu_categories',$this->menu_categories)
        ->with('data',$data);
    }

    public function social() {
        return view('splendid.social')->with('menu_categories',$this->menu_categories);
    }

    public function partnership() {
        $data = Partner::all();
        // dd($data);
        return view('splendid.partnership')->with('menu_categories',$this->menu_categories)
                                            ->with('data',$data);
    }

    

    
    public function product($id) {
        $category = Category::find($id);
        // dd($category->product);
        return view('splendid.products')->with('category',$category)
                                        ->with('menu_categories',$this->menu_categories);
    }

    public function product_detail($id) {
        $product = Product::find($id);
        $accitem = Item::where('product_id',$id)->get();
        $checked=$product->hot_item=='1'?'checked':'';
        // dd($product);
        return view('splendid.product_detail')->with('product',$product)
                                        ->with('menu_categories',$this->menu_categories)
                                        ->with('accitem',$accitem)
                                        ->with('checked',$checked);
    }

    public function addCart(Request $rq)
    {
        $product = Product::find($rq->id);
        $row = ShoppingCart::add($rq->id, $product->product_name,$rq->qty, $product->price,['product_img' => $product->product_img]);
        $count=ShoppingCart::countRows();
        return response()->json(["count"=>$count]);
    }
    public function showCartCount()
    {
       return response()->json(['count'=>ShoppingCart::countRows()]);
    }

    public function view(){
        $cart = ShoppingCart::all();
        // dd($cart);
        $rows = ShoppingCart::countRows();

        $total = ShoppingCart::total();

        return view('splendid.shopping_cart')->with('cart',$cart)
                                             ->with('rows',$rows)
                                             ->with('total',$total)
                                             ->with('menu_categories',$this->menu_categories);
    }

    public function update($rawId,$qty)
    {
       
        ShoppingCart::update($rawId,$qty);
        $total = ShoppingCart::total();
        $item=ShoppingCart::get($rawId);
        return response()->json(["item"=>$item,"total"=>$total]);
    }

    public function trash(Request $req)
    {
        $cart = ShoppingCart::remove($req->id);
        return redirect('/showShoppingCartview');
    }

    public function contact()
    {
        return view('splendid.contact')->with('menu_categories',$this->menu_categories);
    }
    public function about()
    {
        return view('splendid.about')->with('menu_categories',$this->menu_categories);
    }
    public function checkoutView()
    {

        $total = ShoppingCart::total();
        $country =Country::where('name','Myanmar')->get() ;
        return view('splendid.checkout')->with('total',$total)
                                        ->with('country',$country)
                                        ->with('menu_categories',$this->menu_categories);
    }
  
    public function placeOrder(Request $request)
    {
       
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;
        $customer->township = $request->township;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->post_code = $request->post_code;
        $customer->save();

        $payment = new Payment();
        $payment->customer_id= $customer->id;
        $payment->total = ShoppingCart::total();
        $payment->save();

        
        $sproduct = ShoppingCart::all();
        foreach ($sproduct as $sp) {
         $sale = new Sale();
         $sale->payment_id = $payment->id;
         $sale->product_id = $sp->id;
         $sale->quantity = $sp->qty;
         $sale->total_amount = $sp->total;
         $sale->save();
        }
        $cart = ShoppingCart::destroy();
        
        
        // $data = $request->all();
        $data['customer'] = $customer;
        $data['payment'] = $payment;
        $data['sale'] = Sale::where('payment_id',$payment->id)->get();

        // dd($data['sale']);
        $mail = Mail::send('mails.order_mail', ['data' => $data], function ($m) use ($data) {
            // dd($m);
            $m->from('noreply@splendidmyanmar.com', 'Splendid (No Reply)');

            $m->to('dev4.hmm@gmail.com')
            ->subject('Place Order');
        });
        if( count( Mail::failures() ) > 0 ) {
            return redirect()->back()->withErrors(['msg', 'Error sending message!']);
         }
         else{
            return redirect('/')->with('success', 'Thank you for contacting us.We will contact you soon!');
         }

        
    }

    public function promotions(){
        $promotion = Product::where('promo','on')->get();
        return view('splendid.promotions')->with('menu_categories',$this->menu_categories)
                                        ->with('promotion',$promotion);
    }

   public function product_content(){
    //    dd('kdlskla');
    $data = Content::all();
    return view('splendid.content')->with('menu_categories',$this->menu_categories)
                                   ->with('data',$data);
   }

   public function content_detail($id){
    //    dd('kdlskla');
    $data = Content::Find($id);
    // dd($data);
    return view('splendid.content_detail')->with('menu_categories',$this->menu_categories)
                                   ->with('data',$data);
   }

//    erroer_email
    public function send(Request $request){
        $data = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'image'     => $request->image
        );
        
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        
        $image = $request->file('image');

        $path = ('email_img');
        // $path='product_images';
        $filename=date('Ymd-Hi_').$request->file('image')->getClientOriginalName();
        $image->move($path, $filename);

        $mail = Mail::send('splendid.error_email', ['data' => $data, 'filename' => $filename], function ($m) use ($data,$path, $filename){
            // dd($m);
            $m->from('noreply@sterling-myanmar.com', 'Splendid (No Reply)');
            // $m->attach($path);
            $m->to('splendidexperiencektd@gamil.com ')
            ->subject('Errors Message')
            ->attach("email_img/".$filename);
        });
        if( count( Mail::failures() ) > 0 ) {
            return redirect()->back()->withErrors(['msg', 'Error sending message!']);
         }
         else{
            return redirect('/outlets')->with('success', 'Thank you for contacting us.We will contact you soon!');
         }
    }

    // contact email
    public function contactEmail(Request $request){
       
        $data = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'ph'     => $request->ph,
            'comment'     => $request->comment
        );
        
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['ph'];
        $comment = $request['comment'];
        


        $mail = Mail::send('splendid.contact_email', ['data' => $data], function ($m) use ($data){
            // dd($m);
            $m->from('noreply@sterling-myanmar.com', 'Splendid (No Reply)');
            // $m->attach($path);
            $m->to('splendidsale35st@gmail.com')
            ->subject('Comment Message')
            ;
        });
        if( count( Mail::failures() ) > 0 ) {
            return redirect()->back()->withErrors(['msg', 'Error sending message!']);
         }
         else{
            return redirect('/contact')->with('success', 'Thank you for contacting us.We will contact you soon!');
         }
    }



    // footer subscribe
    public function subscribe(Request $request){
       
        $data = array(

            'email'     => $request->email,
        );
 
        $email = $request['email'];

        $mail = Mail::send('splendid.footer_subscribe', ['data' => $data], function ($m) use ($data){
            // dd($m);
            $m->from('noreply@sterling-myanmar.com', 'Splendid (No Reply)');
            // $m->attach($path);
            $m->to('splendidsale35st@gmail.com')
            ->subject('Subscribe Email')
            ;
        });
        if( count( Mail::failures() ) > 0 ) {
            return redirect()->back()->withErrors(['msg', 'Error sending message!']);
         }
         else{
            return redirect('/')->with('success', 'Thank you for subscribing.');
         }
    }

    public function buidPc()
    {
        $pcCategories = PcCategory::with('pcItems')->get();
        $rates =Rate::first();
    //    dd($rates);
        return view('splendid.build_pc')->with('pcItem')->with('menu_categories',$this->menu_categories)
                                        ->with('pcCategories',$pcCategories)
                                        ->with('rates',$rates);
    }

}
