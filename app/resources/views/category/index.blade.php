<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        {{ __("You're in category!") }}
                        <button class="btn-primary"
                                data-te-toggle="modal"
                                data-te-target="#exampleModalCenter"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            Add a category
                        </button>
                        @include('category.create')
                    </div>

                    <div x-data="{ active = false }" class="mt-6">
                        @foreach($categories as $category)
                            @include('category.table')
                        @endforeach
                    </div>
                </div>
            </div>
</x-app-layout>
