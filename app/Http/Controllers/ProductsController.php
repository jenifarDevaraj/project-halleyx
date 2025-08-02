<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\District;
use App\Models\User;
use App\Models\UserImage;
use App\Models\Product;
use App\Models\Order;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $query = Product::query();
                if ($request->has('keyword') && $request->keyword) {
                    $query->where('name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('description', 'like', '%' . $request->keyword . '%');
                }
                if ($request->has('sort_order')) {
                    $query->orderBy('name', $request->sort_order);
                }
                $products = $query->paginate(20);
                return view('pages.admin.products.list',[
                        'route_name'=>'products',
                        'role_name'=>1
                    ],compact('products'));
            }
            if(getUserRoleName()=='customer'){
                $query = Product::query();
                if ($request->has('keyword') && $request->keyword) {
                    $query->where('name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('description', 'like', '%' . $request->keyword . '%');
                }
                if ($request->has('sort_order')) {
                    $query->orderBy('name', $request->sort_order);
                }
                $products = $query->paginate(20);
                $cartCount=count(session()->get('cart', []));
                return view('pages.customer.products.list',[
                        'route_name'=>'products',
                        'role_name'=>1
                    ],compact('products','cartCount'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function add(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                return view('pages.admin.products.add',['route_name'=>'products','role_name'=>1]);
            }
            if(getUserRoleName()=='customer'){
                return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function add_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $product=new Product;
                $product->name=strtolower($request->name);
                $product->description=strtolower($request->description);
                $product->price=strtolower($request->price);
                $product->stock_quantity=$request->stock_quantity;
                $product->save();
                return redirect()->route('products.index');
            }
            if(getUserRoleName()=='customer'){
                return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function edit(Request $request,$id)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $products = Product::where('id',$id)->first();
                return view('pages.admin.products.add',['route_name'=>'products','role_name'=>1],compact('products'));
            }
            if(getUserRoleName()=='customer'){
                return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function edit_submit(Request $request,$id)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $product = Product::find($request->id);
                $product->name = strtolower($request->name);
                $product->description = strtolower($request->description);
                $product->price = strtolower($request->price);
                $product->stock_quantity = $request->stock_quantity;
                $product->save();
                return redirect()->route('products.index');
            }
            if(getUserRoleName()=='customer'){
                return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function delete_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $product = Product::find($request->id)->delete();
            }
            if(getUserRoleName()=='customer'){
                return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function view(Request $request,$id)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $products = Product::where('id',$id)->first();
                return view('pages.admin.products.add',['route_name'=>'products','role_name'=>1],compact('products'));
            }
            if(getUserRoleName()=='customer'){
                $cart=session()->get('cart', []);
                $qty = collect($cart)->firstWhere('id', $id)['qty'] ?? 0;
                $products = Product::where('id',$id)->first();
                return view('pages.customer.products.view',['route_name'=>'products','role_name'=>1],compact('products','id','qty'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function view_submit(Request $request)
    {
        if(Auth::user())
        {
            // if(getUserRoleName()=='admin'){
            //     $products = Product::where('id',$id)->first();
            //     return view('pages.customer.products.view',['route_name'=>'products','role_name'=>1],compact('products'));
            // }
            if(getUserRoleName()=='customer'){
                $productId = $request->productId;
                $qty = $request->qty;
                $cart = session()->get('cart', []);
                $found = false;
                foreach ($cart as &$item) {
                    if ($item['id'] == $productId) {
                        $item['qty']=$request->qty;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $cart[] = [
                        'id' => $productId,
                        'qty' => $request->qty
                    ];
                }
                $cart = array_filter($cart, function ($item) {
                    return isset($item['qty']) && $item['qty'] > 0;
                });
                $cart = array_values($cart);
                session()->put('cart', $cart);
                return redirect()->route('products.index');
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function view_card(Request $request)
    {
        if(Auth::user())
        {
            // if(getUserRoleName()=='admin'){
            //     $products = Product::where('id',$id)->first();
            //     return view('pages.admin.products.add',['route_name'=>'products','role_name'=>1],compact('products'));
            // }
            // return session()->get('cart', []);
            if(getUserRoleName()=='customer'){
                $cart=session()->get('cart', []);
                $productIds = collect($cart)->pluck('id');
                $products = Product::whereIn('id', $productIds)->get();
                $products = $products->map(function ($product) use ($cart) {
                    $cartItem = collect($cart)->firstWhere('id', $product->id);
                        $product->qty = $cartItem['qty'] ?? 0; // default 1 if not found
                        return $product;
                });
                return view('pages.customer.products.card',['route_name'=>'products','role_name'=>1],compact('products'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function view_card_submit(Request $request)
    {
        if(Auth::user())
        {
            // if(getUserRoleName()=='admin'){
            //     return 1;
            // }
            if(getUserRoleName()=='customer'){
                $order=new Order;
                $order->user_id=Auth::user()->id;
                $order->product_json = json_encode(session()->get('cart', []));
                $order->address1=strtolower($request->address1);
                $order->address2=strtolower($request->address2);
                $order->city=strtolower($request->city);
                $order->state=strtolower($request->state);
                $order->zip=strtolower($request->zip);
                $order->country=strtolower($request->country);
                $order->phone=strtolower($request->phone);
                $order->save();
                $cart=session()->get('cart', []);
                foreach ($cart as $item) {
                    $product = Product::find($item['id']);
                    if ($product && $product->stock_quantity >= $item['qty']) {
                        $product->stock_quantity -= $item['qty'];
                        $product->save();
                    }
                }
                session()->forget('cart');
                return redirect()->route('orders.index')
                    ->with('success', 'Order Placed successfully.');
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
}
