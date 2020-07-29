<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(ProductFilterRequest $request)
    {
        $query = Product::with('category')->orderBy('id', 'desc');
        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        foreach (['new', 'hit', 'recommend'] as $field) {
            if ($request->has($field)) {
                $query->$field();
            }
        }

        $products = $query->paginate(6)->withPath('?' . $request->getQueryString());
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category(Request $request, $categoryId)
    {
        $category = Category::where('alias', $categoryId)->first();
        if (is_null($category)) {
            abort(404);
        }
        return view('category', compact('category'));
    }

    public function product($category, $productId)
    {
        $product = Product::where('alias', $productId)->first();
        if (is_null($product)) {
            abort(404);
        }
        return view('product', compact('product'));
    }
}
