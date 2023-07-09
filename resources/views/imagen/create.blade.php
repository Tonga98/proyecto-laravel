<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                    <section>
                        <div>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Cargar imagen') }}
                                </h2>
                            </header>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{route('image.upload')}}" enctype="multipart/form-data"
                                  class="mt-6 space-y-6">
                                @csrf
                                <div>
                                <x-input-label for="image" :value="__('Imagen:')"/>
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" require/>
                                <x-input-error class="mt-2" :messages="$errors->get('image')"/>
                                </div>

                                <div>
                                <x-input-label for="descripcion" :value="__('Pie de foto:')"/>
                                <x-text-input id="descripcion" name="description" type="text" class="mt-1 block w-full" autofocus/>
                                <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                                </div>

                                <!-- BOTON GUARDAR-->
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Subir') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



