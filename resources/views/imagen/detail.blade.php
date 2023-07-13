<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-red-400 via-gray-300 to-blue-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gradient-to-r from-red-400 via-gray-300 to-blue-500">
            <div class="bg-gradient-to-r from-red-400 via-gray-300 to-blue-500 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-xl">
                    <x-image-detail :image="$image" :in_detail="true"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
