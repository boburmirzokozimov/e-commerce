<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create a product') }}
            </h2>
            <a href="{{route('products.create')}}" class="btn-primary">
                Add a product
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-2 my-4 py-6 px-2">
                        @if(!$categories->toArray())
                            Go and create a category first
                        @else
                            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="categories"
                                           class="block mb-2 text-sm font-medium text-gray-900">Select
                                        an category</label>
                                    <select id="categories"
                                            name="category_id"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4 flex flex-wrap">
                                    @foreach($tags as $tag)
                                        <div class=" mr-4 flex items-center">
                                            <label class="mr-2" for="scales">{{$tag->name}}</label>
                                            <input type="checkbox" id="scales" name="tags[]"
                                                   value="{{$tag->id}}">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                                        type="text" id="name" name="name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                                        type="number" id="price" name="price">
                                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>

                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                           for="description">Description</label>
                                    <textarea
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                                        type="text"
                                        id="description"
                                        name="description"
                                        rows="5">

                                </textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>

                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Photo</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                                        type="file" id="image" name="image">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>

                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                            class=" btn-primary">
                                        Create
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
