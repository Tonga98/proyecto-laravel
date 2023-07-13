<?php use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
@props(['image', 'in_detail'])
<div class="mb-6 shadow-2xl p-6">

    {{--Nombre usuario--}}
    <x-username-avatar :user="$image->user"/>

    {{--Imagen feed--}}
    <img class="border " src="{{ route('image', ['imagePath' => $image->image_path]) }}" alt="Imagen">

    {{--Icons Mg y comment--}}
    <x-icons />

    {{--Likes imagen--}}
    <p class="block mb-3 font-medium text-sm text-gray-700 dark:text-gray-300">{{"Likes :".$image->likes->count()}}</p>

    {{--Descripcion imagen--}}
    <x-description :image="$image"/>

    {{--Comentarios imagen--}}
    <h3 class="text-lg font-medium mt-3 mb-2 text-gray-900 dark:text-gray-100">Comentarios:</h3>
    <x-show-comments :in_detail="$in_detail" :image="$image"/>

    {{--Agregar comentario--}}
    <form action="{{ route('comment.add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-4 flex flex-row items-center">
            <input type="hidden" name="image_id" value="{{$image->id}}">
            <x-avatar class="w-8" :image="$user->image"/>
            <input
                class="bg-transparent hover:shadow-md transition-shadow delay-250 focus:shadow p-2 text-gray-200 text-sm"
                style="outline: none"
                type="text" name="comentario" id="comentario" placeholder="Agrega un comentario..."/>
            <input type="image" class="ml-2 h-5" src="{{asset('img/send.png')}}" alt="Enviar">
        </div>
    </form>

    {{--Fecha post imagen--}}
    <div class="mt-2">
        <span class="text-gray-500 ">{{"Hace ". $image->created_at->diffInDays()." dias"}}</span>
    </div>
</div>
