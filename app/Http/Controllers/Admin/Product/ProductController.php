<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    protected  $save_path = 'uploads/products/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category','brand'])->get();

        return view('admin.product.index', compact('products'));

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
        $product = Product::create($request->except(['image_one','image_two','image_three','_token']));

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $image_data = [];
        if($image_one){
            $this->uploadImage($image_one, $image_data,  'image_one');
        }

        if($image_two){
            $this->uploadImage($image_two, $image_data,  'image_two');
        }

        if($image_three){
            $this->uploadImage($image_three, $image_data,'image_three');
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
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();

        return view('admin.product.edit', compact('categories', 'brands','product','subcategories'));
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
        $data = $request->except(['image_one','image_two','image_three','_token','main_slider','hot_deal','best_rated','mid_slider','hot_new','trend','status']);
        $product->update($data);
        $data = [
            'main_slider' => $request->main_slider ? 1 : 0,
            'hot_deal' => $request->hot_deal ? 1: 0,
            'best_rated' => $request->best_rated ?1: 0,
            'mid_slider' => $request->mid_slider ?1:0,
            'hot_new' => $request->hot_new ?1: 0,
            'trend' => $request->trend ?1: 0,
            'status' => $request->status ?1: 0,
        ];

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if($image_one){
            $data = $this->uploadImage($image_one, $data,'image_one');
            $this->deleteFile($product->image_one);
        }
        if($image_two){
            $data = $this->uploadImage($image_two, $data, 'image_two');
            $this->deleteFile($product->image_two);
        }

        if($image_three){
            $data = $this->uploadImage($image_three, $data,'image_three');
            $this->deleteFile($product->image_three);
        }

        $product->update($data);

        $notifications = [
            'messege'   => 'Product Update Successfully!',
            'alert-type'    => 'success'
        ];

        return redirect()->route('admin.product.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->deleteFile($product->image_one);
        $this->deleteFile($product->image_two);
        $this->deleteFile($product->image_three);
        $product->delete();
        $notifications = [
            'messege'   => 'Product delete successfully!',
            'alert-type'    => 'success'
        ];
        return redirect()->back()->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function active(Product $product){
        $product->update(['status'=>1]);
        $notifications = [
            'messege'   => 'Product active successfully!',
            'alert-type'    => 'success'
        ];
        return redirect()->back()->with($notifications);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function inactive(Product $product){
        $product->update(['status'=>0]);
        $notifications = [
            'messege'   => 'Product inactive successfully!',
            'alert-type'    => 'success'
        ];
        return redirect()->back()->with($notifications);
    }


    /**
     * Delete the specified file from storage.
     *
     * @param $path
     * @return mixed
     */

    public function deleteFile($path){
        if(File::exists($path)){
            File::delete($path);
        }
    }

    /**
     * Upload the image in specified directory
     *
     * @param $image_three
     * @param array $image_data
     * @param $product
     * @param  $field
     * @return array
     */
    public function uploadImage($image, array $image_data, $field): array
    {
        if (!file_exists(storage_path($this->save_path))) {
            mkdir(storage_path($this->save_path), 0777, true);
        }

        $image_extension = $image->getClientOriginalExtension();
        $image_name = hexdec(uniqid()) . '.' . $image_extension;
        $image_full_name = $this->save_path . $image_name;
        Image::make($image)->resize(300, 300)->save(storage_path($this->save_path. $image_full_name));
        $image_data[$field] = $image_full_name;

        return $image_data;
    }
}
