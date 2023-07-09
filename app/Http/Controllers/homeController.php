<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ImageController;
use App\Models\Image;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $images = Image::all();
        return view('home', ['images'=>$images]);
    }
}
