<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name'  =>  'required|unique:categories|max:255'
        ]);
        Category::create($request->all());

        $notifications = [
            'messege'   =>  'Category added successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->back()->with($notifications);
    }

    public function edit(Category $category){
       return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, Request $request){
        $request->validate([
            'name' =>   'required|max:255|unique:categories,name,'.$category->id
        ]);

        $category->update($request->all());

        $notifications = [
            'messege'   =>  'Category update successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->route('admin.category.index')->with($notifications);
    }


    public function destroy(Category $category){
        $category->delete();
        $notifications = [
            'messege'   =>  'Category delete successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->back()->with($notifications);
    }

    public function getAllSubCategories(Category $category){
        $subcategories = $category->subcategories;
        return $subcategories;
    }
}
