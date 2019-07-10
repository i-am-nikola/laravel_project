<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAdd(){
        return view('admin/product.add');
    }

    public function postAdd(){
        
    }
}
