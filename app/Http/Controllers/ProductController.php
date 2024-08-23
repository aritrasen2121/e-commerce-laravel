<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $distinctCategories = Product::distinct('category')->pluck('category');

        return view('pages.products')->with(["products" => $products, "distinctCategories" => $distinctCategories, "checked" => ['Mobiles', 'Electronics', 'Home', 'Fashion'], 'min_price' => 0, 'max_price' => 1000000]);
    }

    public function show(string $id)
    {
        $product = Product::where("id", $id)->get();
        if (!$product->isEmpty())
            return view('pages.product-description')->with("product", $product[0]);
        else
            return view('pages.product-description');
    }

    public function filter(Request $request)
    {
        $min_price = 0;
        $max_price = 1000000;

        if ($request->min != null) $min_price = $request->min;
        if ($request->max != null) $max_price = $request->max;

        $start_rating = 0;
        $end_rating = 5;
        if ($request->rating != null) {
            $start_rating = intval($request->rating) - 1;
            $end_rating = $start_rating + 1;
        } else {
            $start_rating = 0;
            $end_rating = 5;
        }

        $categories = ['Mobiles', 'Electronics', 'Home', 'Fashion'];
        if ($request->categories != null)  $categories = $request->categories;

        $filteredProduct = Product::whereIn('category', $categories)->whereBetween('price', [$min_price, $max_price])->whereBetween('rating', [$start_rating, $end_rating])->get();

        $distinctCategories = Product::distinct('category')->pluck('category');

        if ($start_rating == 0 && $end_rating == 5) $selected_rating = $end_rating + 1;
        else $selected_rating = $end_rating;
        return view('pages.products')->with(["products" => $filteredProduct, "distinctCategories" => $distinctCategories, "checked" => $request->input('categories'), 'rating' => $selected_rating, 'min_price' => $min_price, 'max_price' => $max_price]);
    }
}
