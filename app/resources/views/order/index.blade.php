<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}
            </h2>
            <button @click="active=true" type="button" class="btn-primary">
                Add Order
            </button>
        </div>
    </x-slot>

    <div
        x-show="active"
        @click.away="active=false"
        class="absolute z-20 left-1/2 -translate-x-[50%] w-1/4"
    >
        @include('order.create')
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('order.table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
