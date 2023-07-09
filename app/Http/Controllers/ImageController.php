<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response as respon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Image as Img;

class ImageController extends Controller
{
    public function create(){
        return view('imagen.create');
    }

    public function store(Request $request) : RedirectResponse

    {
        //Valido la imagen
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|required',
            'description' => 'string|max:255'
        ]);


        //Si me llego una imagen por el formulario
        if($request->hasFile('image')){

            //Obtengo la imagen
            $imageFile = $request->file('image');

            //Obtengo el nombre original de la imagen, agrego time para que no se vayan a repetir dos nombres
            $imageName = time().$imageFile->getClientOriginalName();

            //Guardo la imagen en el disk users
            $path = $imageFile->storeAs('images',$imageName);
            $path = storage_path('app/'.$path);

            //La redimensiono y con el save se guarda en el mismo lugar la imagen pero redimensionada
            Image::make($path)->fit(500,500)->orientate()->save();

            //Obtengo el usuario para asignarle el id a la imagen
            $user = $request->user();


            //Creo instancia de imagen
            $file = new Img;
            $file->user_id = $user->id;
            $file->image_path = $imageName;
            $file->description = $request->input('description');
            $file->save();
        }
        return redirect(route('inicio'));
    }
    public function getImage($imagePath){
        $file = Storage::disk('images')->get($imagePath);
        return new Respon($file, 200);
    }

   // public function resize(){
   //     $images = Img::all();
   //     $folderpath = "../storage/app/images";
   //     $files = scandir($folderpath);
   //     var_dump($files);
   //     $i=3;
   //     foreach ($files as $file) {
   //         if (!in_array($file, ['.', '..'])) {
   //             $image = Image::make($folderpath . '/' . $file);
   //             $image->fit(500, 500)->orientate()->save();
   //         }
   //     }
   //     echo 'Listo';
   // }
    }
