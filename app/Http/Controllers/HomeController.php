<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'categories'  => Category::all(),
            'banner'   => Banner::all(),
        ];
        if(count($data['banner']) < 1) {
            $data['banner'] = [];
        }
        return view('home', compact('data'));
    }
}
