@props(['image'])

<div class="items-center text-gray-100">
    <strong class="whitespace-nowrap">{{$image->user->name.": "}}</strong>
    <p>{{$image->description}}</p>
</div>
