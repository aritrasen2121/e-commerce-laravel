<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailServer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index(){

        // getting orders which are not placed
        $products = Product::select('products.name')
                  ->join('orders', 'orders.product_id', '=', 'products.id')
                  ->where('orders.user_id', Auth::user()->id)
                  ->where('orders.placed', 0) 
                  ->get();

        $products_name = $products->pluck('name');

        $products_name->all();

        // updating orders which are not placed
        $affectedRows = Order::join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', Auth::user()->id)
        ->where('orders.placed', 0)
        ->update(['placed' => 1]);

        $mailData=[
            'name'=>Auth::user()->name,
            'body'=>$products_name,
        ];

        Mail::to(Auth::user()->email)->send(new MailServer($mailData));
        return view('pages.order-confirmed');
    }
}
