<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->all();
        unset($params['img']);
        if ($request->hasFile('img')) {
            $imgName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs(
                'categories',
                $params['alias'] . '_' . $imgName
            );
            $params['img'] = $path;
        }
        Category::create($params);
        session()->flash('success', 'Категория добавлена');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $params = $request->all();
        unset($params['img']);
        if ($request->hasFile('img')) {
            Storage::delete($category->img);

            $imgName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs(
                'categories',
                $params['alias'] . '_' . $imgName
            );
            $params['img'] = $path;
        }
        $category->update($params);
        session()->flash('success', 'Категория отредактирована');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->img);
        $category->delete();
        session()->flash('success', 'Категория удалена');
        return redirect()->route('admin.categories.index');
    }
}
