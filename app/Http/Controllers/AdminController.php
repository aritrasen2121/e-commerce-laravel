<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard')->with(['products' => $products]);
    }

    // products
    public function products()
    {
        $products = Product::all();
        return view('admin.products')->with(['products' => $products]);
    }

    // add product
    public function addProduct()
    {
        return view('admin.add-product');
    }
    // store
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|digits_between:3,5',
            'discount' => 'required|numeric|digits_between:0,2',
            'rating' => 'required',
            'status' => 'required',
            'itemsold' => 'required|numeric|digits_between:0,3',
        ]);
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->rating = $request->rating;
        $product->status = $request->status;
        $product->itemsold = $request->itemsold;
        $product->save();

        return view('admin.add-product');
    }

    // update product
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|digits_between:3,5',
            'discount' => 'required|numeric|digits_between:0,2',
            'rating' => 'required',
            'status' => 'required',
            'itemsold' => 'required',
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->rating = $request->rating;
        $product->status = $request->status;
        $product->itemsold = $request->itemsold;
        $product->save();
        return view('admin.dashboard');
    }
    public function updateForm(string $id)
    {
        $product = Product::find($id);
        $distinctCategories = Product::distinct('category')->pluck('category');
        $distinctStatuses = Product::distinct('status')->pluck('status');

        return view('admin.update-product')->with(['product' => $product,"distinctCategories"=>$distinctCategories,'distinctStatuses'=>$distinctStatuses]);
    }
    // destroy product
    public function destroyProduct(string $id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }


    // customer
    public function customers()
    {
        $users = User::all();
        return view('admin.customers')->with(['users' => $users]);
    }

    public function changeRole(string $id)
    {
        $user = User::find($id);
        if ($user->type=='admin') {
            $user->type='user';
        } else if($user->type=='user'){
            $user->type='admin';
        }
        $user->save();
        return redirect()->back();
    }

    public function changeStatus(string $id)
    {
        $user = User::find($id);
        if ($user->status=='active') {
            $user->status='inactive';
        } else if($user->status=='inactive'){
            $user->status='active';
        }
        $user->save();
        return redirect()->back();
    }

    // orders
    public function orders()
    {
        $orders = Order::select('users.name as user_name', 'users.email as user_email', 'products.name  as product_name','products.image as product_image')
        ->from('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->get();
        return view('admin.order')->with(['orders' => $orders]);
    }

    
   
}
