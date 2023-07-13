@props(['image'])

<img {{$attributes->merge(['class'=>'rounded-full mr-2 mb-2'])}}
     src="{{ route('user.avatar', ['fileName' => $image]) }}" alt="avatar"/>
