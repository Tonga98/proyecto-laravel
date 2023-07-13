<?php use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
<script src="{{ asset('js/custom.js') }}"></script>
@if($images)
    @foreach($images as $image)
        <x-image-detail :image="$image" :in_detail="false"/>
    @endforeach
@else
    <p>No se encontró ninguna imagen.</p>
@endif

