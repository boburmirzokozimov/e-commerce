<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tags') }}
            </h2>
            <button @click="active = true" class="btn-primary">
                Add a tag
            </button>

        </div>
    </x-slot>
    <div
        x-cloak
        x-show="active"
        @click.away="active = false"
        class="absolute z-10 top-1/2 right-1/2 py-6 px-4 my-4 mb-6 rounded-xl translate-x-[50%] bg-white">
        @include('tag.create')
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data="{active:false}">
                    @include('tag.table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
