<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\InsertProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::paginate(10);

        return view('product.listProducts', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('product.createProduct', compact('categories'));
    }


    public function store(InsertProductRequest $request)
    {
        $request->insertProduct($request);

        return redirect()->route('products.index');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('product.editProduct', compact('categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->updateProduct($request, $product);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
