<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class ProductsController extends Controller
{
    public function productsIndex()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();
        return back();
    }

    public function editProduct(Product $product)
    {
        return view('admin.detail-product', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->update();

        return $this->productsIndex();
    }

    public function createProduct()
    {
        return view('admin.detail-product');
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return $this->productsIndex();
    }

    public function catalogIndex(){
        $products = Product::all();
        return view('user.catalog', compact('products'));
    }

    public function showProduct(Product $product)
    {
        return view('user.detail', compact('product'));
    }

}
