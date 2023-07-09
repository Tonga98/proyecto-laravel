@if($images)
    @foreach($images as $image)
        <strong class="text-lg font-medium text-gray-900 dark:text-gray-100">{{"Usuario: " .  $image->user->name }}</strong><br>
        <img  src="{{ route('image', ['imagePath' => $image->image_path]) }}" alt="Imagen">
        <strong>{{$image->description}}</strong>
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
