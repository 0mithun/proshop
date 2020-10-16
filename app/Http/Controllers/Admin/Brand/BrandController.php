<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class BrandController
 * @package App\Http\Controllers\Admin\Brand
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Brand $brand, Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:brands|max:255',
            'logo'      => 'required|max:1024'
        ]);
        $data = [
            'name'  => $request->name,
        ];
        if($request->file('logo')){
            $logoName = date('dmy_H_s_i');
            $extension = strtolower($request->file('logo')->getClientOriginalExtension());
            $fullName = 'uploads/brands/'.$logoName.'.'.$extension;
            $request->file('logo')->storeAs('public',$fullName);
            $data['logo'] = $fullName;
        }

        Brand::create($data);

        $notofications =[
            'messaege'  => 'Brand Created Successfully!',
            'alert-type'    => 'success'
        ];

        return redirect()->back()->with($notofications);

    }



    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
       return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'      => 'required|max:255|unique:brands,name,'.$brand->id,
            'logo'      => 'required|max:1024'
        ]);

        $data = [
            'name'  => $request->name
        ];
        if($request->file('logo')){
            $logoName = date('dmy_h_i_s');
            $extension = strtolower($request->file('logo')->getClientOriginalExtension());
            $fullName = 'uploads/brands/'.$logoName.'.'.$extension;
            $request->file('logo')->storeAS('public', $fullName);

            if(File::exists($brand->logo)){
                File::delete($brand->logo);
            }
            $data['logo'] = $fullName;
        }

        $brand->update($data);

        $notofications =[
            'messaege'  => 'Brand Update Successfully!',
            'alert-type'    => 'success'
        ];

        return redirect()->back()->with($notofications);
    }

    /**
     * Remove the specified resource from storage.

     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(File::exists($brand->logo)){
            File::delete($brand->logo);
        }
        $brand->delete();
        $notofications =[
            'messaege'  => 'Brand Deleted Successfully!',
            'alert-type'    => 'success'
        ];

        return redirect()->back()->with($notofications);
    }
}
