<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Newslater;
class NewslaterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email'     =>  'required|email|unique:newslaters'
        ]);
        Newslater::create($request->all());
        $notifications = [
            'messege'   =>  'Newslater Subscribe Successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->back()->with($notifications);
    }
}
