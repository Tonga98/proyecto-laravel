<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use Intervention\Image\Facades\Image as Img;
use Illuminate\Http\Request;
use Illuminate\Http\Response as respon;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index(){
        $images = Image::orderBy('id','desc')->paginate(5);
        return view('home', ['images'=>$images]);
    }

    public function getMg(){
        $fullPath = storage_path('app/public/mg3.png');
        return response()->file($fullPath);
    }
}
