@props(['in_detail', 'image'])

@if($in_detail)
    @foreach($image->comments as $comment)
        <div class="flex flex-row">
            <x-avatar :image="$comment->user->image" class="w-6"/>
            <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{$comment->user->name. " : " . $comment->content}}</p>
        </div>
    @endforeach
@else
    @foreach($image->comments->take(3) as $comment)
        <div class="flex flex-row">
            <x-avatar :image="$comment->user->image" class="w-6"/>
            <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{$comment->user->name. " : " . $comment->content}}</p>
        </div>
    @endforeach

    @if($image->comments->count() == 4)
        <a href="{{route('image.detail',['image' => $image])}}"><span
                class="text-gray-500 pt-1">{{"Ver ".($image->comments->count()-3)." comentario"}}</span></a>

    @elseif($image->comments->count() > 4)
        <a href="{{route('image.detail',['image' => $image])}}"><span
                class="text-gray-500 pt-1">{{"Ver los ".($image->comments->count()-3)." comentarios"}}</span></a>

    @endif
@endif
