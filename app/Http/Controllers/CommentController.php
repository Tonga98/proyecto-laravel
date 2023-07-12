<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse{

        //Obtengo el id de la imagen y del usuario
        $image_id = $request->input('image_id');
        $user_id = $request->user()->id;

        //valido el comentario
        $content = $request->validate([
            'comentario'=>'string|required|max:255'
            ])['comentario'];

         //Creo nuevo comentario y lo guardo
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();

        // Redirigir
        return redirect(url()->previous().'#'.$image_id);
    }

}
