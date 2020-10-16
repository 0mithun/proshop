<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return  view('admin.product.create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $save_path = 'uploads/products/';
        if (!file_exists(storage_path('app/public/'.$save_path))) {
            mkdir(storage_path('app/public/'.$save_path), 0777, true);
        }

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $image_one_extension = $image_one->getClientOriginalExtension();
        $image_one_name = hexdec(uniqid()).'.'.$image_one_extension;
        $image_one_full_name =  $save_path. $image_one_name;
        Image::make($image_one)->resize(300, 300)->save(storage_path('app/public/'.$image_one_full_name));
        $image_one = $image_one_full_name;
        $data = collect($request->except(['image_one','image_two','image_three','_token']))->merge(compact('image_one'));

        $product = Product::create($data->all());

        $image_data = [];
        if($image_two){
            $image_two_extension = $image_two->getClientOriginalExtension();
            $image_two_name = hexdec(uniqid()).'.'.$image_two_extension;
            $image_two_full_name =  $save_path. $image_two_name;
            Image::make($image_two)->resize(300, 300)->save(storage_path('app/public/'.$image_two_full_name));
            $image_data['image_two'] = $image_two_full_name;
        }

        if($image_three){
            $image_three_extension = $image_three->getClientOriginalExtension();
            $image_three_name = hexdec(uniqid()).'.'.$image_three_extension;
            $image_three_full_name = $save_path. $image_three_name;
            Image::make($image_three)->resize(300, 300)->save(storage_path('app/public/'.$image_three_full_name));
            $image_data['image_three'] = $image_three_full_name;
        }

        $product->fresh();
        $product->update($image_data);

        $notifications = [
            'messege'   => 'Product Create Successfully!',
            'alert-type'    => 'success'
        ];

        return redirect()->route('admin.product.index')->with($notifications);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
