<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class CartController extends Controller
{
    //
    public function index(){
        $user=Auth::user();

        $user_cart=Cart::where('user_id',$user->id)->get();
        $user_order=Order::where('user_id',$user->id)->get();

        $product_id_arr=array();
        foreach ($user_cart as $item) {
            array_push($product_id_arr,$item->product_id);
        }

        $user_cart_items=Product::whereIn('id',$product_id_arr)->get();

        $product_id_arr2=array();
        foreach ($user_order as $item) {
            array_push($product_id_arr2,$item->product_id);
        }

        $user_order_items=Product::whereIn('id',$product_id_arr2)->get();

        $total_price=0;
        $total_discount=0;
        foreach ($user_cart_items as $item) {
            $total_price+=$item->price;
            $total_discount+=($item->price*$item->discount)/100;
        }
        $final_price=$total_price-$total_discount;
        if($final_price!=0) $final_price=+99+149;
        
        $products = Product::paginate(3);
        return view('pages.cart')->with(['products'=>$products,'user_cart_items'=>$user_cart_items,'user_order_items'=>$user_order_items,'total_price'=>$total_price,'total_discount'=>$total_discount,'final_price'=>$final_price]);
    }

    public function store(string $id){

        $user_cart=Cart::where([
            ['user_id', '=', Auth::user()->id],
            ['product_id', '=', $id],
        ])->get();
        

        if($user_cart->isEmpty()){
            $new_cart= new Cart;
            $new_cart->user_id=Auth::user()->id;
            $new_cart->product_id=$id;
            $new_cart->save();
        }
        return redirect()->back();
    }

    
    public function destroy($id){
        $user_cart=Cart::where([
            ['user_id', '=', Auth::user()->id],
            ['product_id', '=', $id],
        ])->delete();
        
        return redirect('cart');
    }
    public function checkout(){
        $user_cart=Cart::where([
            ['user_id', '=', Auth::user()->id],
        ])->get();
        foreach ($user_cart as $key => $value) {
            $order=new Order();
            $order->user_id=$value->user_id;
            $order->product_id=$value->product_id;
            $order->placed=0;
            $order->save();
            Cart::where('id',$value->id)->delete();
        }
        return redirect()->route('mails.send');
    }
}
