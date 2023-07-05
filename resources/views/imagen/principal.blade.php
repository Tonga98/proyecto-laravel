<?php use App\Models\Image;
use App\Models\User;?>
@if($images)
    @foreach($images as $image)
        <strong>{{"Usuario: " .  $image->user->name }}</strong><br>
        <img src="{{ asset($image->image_path) }}" alt="Imagen">
        <br>
        <h3>Comments:</h3>
        @foreach($image->comments as $comment)
            <br>
            {{$comment->user->name. " : " . $comment->content}}
            <br>
        @endforeach
        <br>
        {{"Likes :".$image->likes->count()}}
        <hr>
        <br>
    @endforeach
@else
    <p>No se encontró ninguna imagen.</p>
@endif

