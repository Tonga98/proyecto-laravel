<?php use App\Models\Image;
use App\Models\User;?>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                    @if($images)
                        @foreach($images as $image)
                            <strong class="text-lg font-medium text-gray-900 dark:text-gray-100">{{"Usuario: " .  $image->user->name }}</strong><br>
                            <img src="{{ asset($image->image_path) }}" alt="Imagen">
                            <br>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Comentarios:</h3>
                            @foreach($image->comments as $comment)
                                <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{$comment->user->name. " : " . $comment->content}}</p>
                            @endforeach
                            <br>
                            <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{"Likes :".$image->likes->count()}}</p>
                            <hr>
                            <br>
                        @endforeach
                    @else
                        <p>No se encontró ninguna imagen.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



