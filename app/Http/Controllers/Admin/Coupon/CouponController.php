<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();

        return view('admin.coupon.index',compact('coupons'));
    }

    public function store(Request $request){
        $request->validate([
            'coupon'    =>  'required|max:50',
            'discount'  =>  'required'
        ]);

        Coupon::create($request->all());

        $notifications = [
            'messege'  => 'Coupon created successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->back()->with($notifications);
    }

    public function edit(Coupon $coupon){
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Coupon $coupon, Request $request){
        $request->validate([
            'coupon'    =>  'required|max:50',
            'discount'  =>  'required'
        ]);

       $coupon->update($request->all());

        $notifications = [
            'messege'  => 'Coupon updated successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->route('admin.coupon.index')->with($notifications);
    }

    public function destroy(Coupon $coupon){
        $coupon->delete();
        $notifications = [
            'messege'  => 'Coupon Deleted successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->route('admin.coupon.index')->with($notifications);
    }
}
