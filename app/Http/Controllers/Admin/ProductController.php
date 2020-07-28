<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $params = $request->all();
        unset($params['img']);
        if ($request->hasFile('img')) {
            $imgName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs(
                'products',
                $params['alias'] . '_' . $imgName
            );
            $params['img'] = $path;
        }

        foreach (['new', 'recommend', 'hit'] as $field) {
            if (isset($params[$field])) {
                $params[$field] = 1;
            }
        }

        Product::create($params);
        session()->flash('success', 'Товар добавлен');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        unset($params['img']);
        if ($request->hasFile('img')) {
            Storage::delete($product->img);

            $imgName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs(
                'products',
                $params['alias'] . '_' . $imgName
            );
            $params['img'] = $path;
        }

        foreach (['new', 'recommend', 'hit'] as $field) {
            if (isset($params[$field])) {
                $params[$field] = 1;
            } else {
                $params[$field] = 0;
            }
        }

        $product->update($params);
        session()->flash('success', 'Товар изменен');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->img);
        $product->delete();
        session()->flash('success', 'Товар удален');
        return redirect()->route('admin.products.index');
    }
}
