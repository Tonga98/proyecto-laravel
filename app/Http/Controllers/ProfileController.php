<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Faker\Core\File;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as respon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //Obtengo el usuario e imagen
        $user = $request->user();

        //Valido los datos menos el de imagen
        $validatedData = $request->validated();
        unset($validatedData['image']);


        //Si me llego una imagen por el formulario
        if($request->hasFile('image')){

            //Obtengo la imagen
            $imageFile = $request->file('image');


            //Obtengo el nombre original de la imagen, agrego time para que no se vayan a repetir dos nombres
            $imageName = time().$imageFile->getClientOriginalName();

            //Guardo la imagen en el disk users
            $path = $imageFile->storeAs('users',$imageName);
            $path = storage_path('app/'.$path);

            //La redimensiono y con el save se guarda en el mismo lugar la imagen pero redimensionada
            Image::make($path)->fit(100,100)->orientate()->circle(100,50,50)->save();

            // Guardar la ruta de la imagen en el modelo User
            $validatedData['image'] = $imageName;
        }

        // Llenar los campos del usuario
        $user->fill($validatedData);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        //Guardo en la db
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getImage($fileName){
        $file = Storage::disk('users')->get($fileName);
        return new Respon($file, 200);
    }

}
