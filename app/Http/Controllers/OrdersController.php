<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\District;
use App\Models\User;
use App\Models\UserImage;
use App\Models\Product;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $query = Order::query();
                $query->orderBy('created_at', 'desc');
                $products = $query->paginate(20);
                return view('pages.admin.orders.list',[
                        'route_name'=>'orders',
                        'role_name'=>1
                    ],compact('products'));
            }
            if(getUserRoleName()=='customer'){
                $query = Order::query();
                $query->orderBy('created_at', 'desc');
                $query->where('user_id', Auth::user()->id);
                $products = $query->paginate(20);
                return view('pages.customer.orders.list',[
                        'route_name'=>'orders',
                        'role_name'=>1
                    ],compact('products'));
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
                $order = Order::find($id);

                if (!$order) {
                    return abort(404, 'Order not found');
                }
                $cart = json_decode($order->product_json, true);
                $cart = is_array($cart) ? $cart : [];
                $productIds = collect($cart)->pluck('id')->all();
                $products = Product::whereIn('id', $productIds)->get();
                $productsWithQty = $products->map(function ($product) use ($cart) {
                    $item = collect($cart)->firstWhere('id', $product->id);
                    $product->qty = $item['qty'] ?? 0;
                    return $product;
                });
                return view('pages.customer.orders.view', [
                    'route_name' => 'orders',
                    'role_name' => 1,
                    'products' => $productsWithQty,
                    'id' => $id,
                    'order'=>$order
                ]);
            }
            if(getUserRoleName()=='customer'){
                $order = Order::find($id);

                if (!$order) {
                    return abort(404, 'Order not found');
                }
                $cart = json_decode($order->product_json, true);
                $cart = is_array($cart) ? $cart : [];
                $productIds = collect($cart)->pluck('id')->all();
                $products = Product::whereIn('id', $productIds)->get();
                $productsWithQty = $products->map(function ($product) use ($cart) {
                    $item = collect($cart)->firstWhere('id', $product->id);
                    $product->qty = $item['qty'] ?? 0;
                    return $product;
                });
                return view('pages.customer.orders.view', [
                    'route_name' => 'orders',
                    'role_name' => 1,
                    'products' => $productsWithQty,
                    'id' => $id,
                ],compact('order'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function status_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $product = Order::find($request->id)->update(['status'=>$request->status]);
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
}
