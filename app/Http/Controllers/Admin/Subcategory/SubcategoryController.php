<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;

/**
 * Class SubcategoryController
 * @package App\Http\Controllers\Admin\Subcategory
 */
class SubcategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function index(){
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name'  => 'required|unique:subcategories|max:255',
            'category_id'=>'required|numeric'
        ],[
            'category_id.required'=> 'The category field is required'
        ]);

        Subcategory::create($request->all());

        $notifications = [
            'messege'   => 'Sub Category created successfully',
            'alert-type'=>'success'
        ];

        return redirect()->back()->with($notifications);
    }


    public function edit(Subcategory $subcategory){
        $subcategory->load('category');
        $categories = Category::all();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Subcategory $subcategory, Request $request){
        $request->validate([
            'name'  => 'required|max:255|unique:subcategories,name,'.$subcategory->id,
            'category_id'=>'required|numeric'
        ],[
            'category_id.required'=> 'The category field is required'
        ]);

        $subcategory->update($request->all());

        $notifications = [
            'messege'   => 'Sub Category updated successfully',
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.subcategory.index')->with($notifications);

    }

    public function destroy(Subcategory $subcategory){
        $subcategory->delete();

        $notifications = [
            'messege'   => 'Sub Category deleted successfully',
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.subcategory.index')->with($notifications);
    }
}
