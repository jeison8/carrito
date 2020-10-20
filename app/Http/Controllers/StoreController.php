<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Product;
use App\Category;
use App\Department;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InsertShippingInfoRequest;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['shippingInfo']);
    }


    public function index()
    {
        $products = Product::with('category')->get();

        $laptops = $products->where('categories_id', 1);
        $accessories = $products->where('categories_id', 2);
        $cellPhones = $products->where('categories_id', 3);

        return view('index', compact('laptops', 'accessories', 'cellPhones'));
    }


    public function detail(Request $request, Product $product)
    {
        if ($request->ajax()) {
            return $product;
        }

        return view('detail', compact('product'));
    }


    public function addCart(Product $product)
    {
        $product->category;

        return $product;
    }


    public function order()
    {
        if (Auth::check()) {
            return $this->redirections();
        }

        return view('order');
    }


    public function shippingInfo()
    {
        return $this->redirections();
    }


    public function redirections()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $departments = Department::orderBy('name', 'ASC')->get();

        return view('shippingInfo', compact('user', 'departments'));
    }


    public function findCities(Request $request)
    {
        return City::where('departments_id', $request->id)->orderBy('name', 'ASC')->get();
    }

    public function allCategories(Request $request)
    {
        return Category::all();
    }

    public function search(Request $request)
    {
        if ($request->find) {
            $find = $request->find;
            $products = Product::whereHas('category', function ($query) use ($find) {
                $query->where('name', 'like', '%'.$find.'%');
            })->orWhere('name', 'like', '%'.$find.'%')->get();
        } else {
            if ($request->categories_id  == 'all') {
                return $this->index();
            }

            $products = Product::where('categories_id', $request->categories_id)->get();
        }

        return view('index', compact('products'));
    }
}
