<?php

namespace App\Http\Controllers;

use App\Categoy;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categoy::all();
        return view('categories')->with('categories', $categories);
    }


    public function remove($id)
    {
        $category = Categoy::findOrFail($id);
        $category->delete();
        return back();
    }

    public function store(StoreCategoryRequest $request)
    {
        $params = $request->validated();
        Categoy::create($params);
        return back();
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $params = $request->validated();
        $category = Categoy::findOrFail($id);
        $category->update($params);
        return $this->index();
    }

    public function details($id)
    {
        $category = Categoy::findOrFail($id);
        return view('detailsCategory')->with('category',$category);
    }
}
