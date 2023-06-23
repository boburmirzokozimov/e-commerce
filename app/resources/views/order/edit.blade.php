<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create a product') }}
            </h2>
            <a href="{{route('orders')}}" class="btn-primary">
                Back
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-2 my-4 py-6 px-2">
                        <form action="{{route('orders.update',['order'=>$order->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <h4 class="mb-4">Edit order</h4>
                            <hr class="mb-4">

                            @foreach($order->products as $key=>$product)

                                <div class="flex items-center mr-2 mb-2">
                                    <div class="flex items-center align-middle">
                                        <input type="checkbox" id="order" value="{{$product->id}}"
                                               checked
                                               name="order[{{$key}}][product_id]"
                                               class="border-gray-200 rounded">
                                        <label for="order" class="label">{{$product->name}}</label>
                                    </div>
                                    <input
                                        type="number"
                                        name="order[{{$key}}][count]"
                                        class="border-gray-200 rounded"
                                        value="{{$product->pivot->count }}"
                                    >
                                </div>
                            @endforeach

                            <div class="mb-4">
                                <label for="name" class="label">Name</label>
                                <input type="text" name="name" id="name"
                                       value="{{$order->name}}"
                                       class="input">
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="label">Phone</label>
                                <input type="text" name="phone" id="phone"
                                       value="{{$order->phone}}"
                                       class="input">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
