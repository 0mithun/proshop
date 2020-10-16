<?php

namespace App\Http\Controllers\Admin\Newslater;

use App\Http\Controllers\Controller;
use App\Model\Newslater;
use Illuminate\Http\Request;

class NewslaterController extends Controller
{
    public function index(){
        $newslaters = Newslater::all();
        return view('admin.newslater.index',compact('newslaters'));
    }

    public function destroy(Newslater $newslater){
        $newslater->delete();

        $notifications = [
            'messege'   =>  'Newslater deleted successfully!',
            'alert-type'    =>  'success'
        ];

        return redirect()->route('admin.newslater.index')->with($notifications);
    }
}
