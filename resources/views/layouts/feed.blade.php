<?php use Illuminate\Support\Facades\Auth; ?>
@if($images)
    @foreach($images as $image)
        <div class="mb-6 shadow-2xl p-6">

            {{--Nombre usuario--}}
            <div class="flex flex-row">
                @if($image->user->image)
                    <img class="rounded-full w-8 mr-2 mb-2"
                         src="{{ route('user.avatar', ['fileName' => $image->user->image]) }}" alt="avatar"/>
                @endif
                <strong
                    class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-0.5 block max-w-fit">{{ $image->user->name }}</strong>
            </div>

            {{--Imagen feed--}}
            <a id="{{$image->id}}"></a> {{--Este a es un ancla para luego de hacer un comentario redirigir a la img comentada--}}
            <img src="{{ route('image', ['imagePath' => $image->image_path]) }}" alt="Imagen">

            {{--Icons Mg y comment--}}
            <div class="py-3 flex flex-row">
                <img class="w-7 hover:bg-red-500 cursor-pointer" src="{{ asset('img/mg4.png') }}" alt="mg">
                <img class="w-7 hover:bg-red-500 cursor-pointer ml-5" src="{{ asset('img/comment.png') }}" alt="mg">
            </div>

            {{--Likes imagen--}}
            <p class="block mb-3 font-medium text-sm text-gray-700 dark:text-gray-300">{{"Likes :".$image->likes->count()}}</p>


            {{--Descripcion imagen--}}
            <div class="items-center text-gray-100">
                <strong class="whitespace-nowrap">{{$image->user->name.": "}}</strong>
                <p>{{$image->description}}</p>
            </div>

            {{--Comentarios imagen--}}
            <h3 class="text-lg font-medium mt-3 mb-2 text-gray-900 dark:text-gray-100">Comentarios:</h3>
            @foreach($image->comments->take(3) as $comment)
                <div class="flex flex-row">
                @if($comment->user->image)
                    <img class="rounded-full w-6 mr-2 mb-2"
                         src="{{ route('user.avatar', ['fileName' => $comment->user->image]) }}" alt="avatar"/>
                @endif
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{$comment->user->name. " : " . $comment->content}}</p>
                </div>
            @endforeach

            @if($image->comments->count() > 3)
                <a href=""><span
                        class="text-gray-500 pt-1">{{"Ver los ".($image->comments->count()-3)." comentarios"}}</span></a>
            @endif

            {{--Agregar comentario--}}
            <form action="{{ route('comment.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-4 flex flex-row items-center">
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                    @if(Auth::user()->image)
                        <img class="rounded-full w-8 mr-2 mb-2"
                             src="{{ route('user.avatar', ['fileName' => Auth::user()->image]) }}" alt="avatar"/>
                    @endif
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
    @endforeach
@else
    <p>No se encontró ninguna imagen.</p>
@endif

