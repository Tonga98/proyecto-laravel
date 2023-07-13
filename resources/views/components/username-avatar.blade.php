@props(['user'])

<div class="flex flex-row">
    <x-avatar class="w-8" :image="$user->image"/>
    <strong class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-0.5 block max-w-fit">{{ $user->name }}</strong>
</div>
