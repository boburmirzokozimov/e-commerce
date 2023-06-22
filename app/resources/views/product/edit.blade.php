<div
    x-show="active === {{$product->id}}"
    x-cloak="active == {{$product->id}}"
    @click.away="active = false"
    class="absolute right-[50%] top-1/2  translate-x-[50%] translate-y-[-40%] pointer-events-auto flex w-[400px]  px-4 py-6 flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
    <form action="{{ route('products.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="categories"
                   class="block mb-2 text-sm font-medium text-gray-900">Select
                an category</label>
            <select id="categories"
                    name="category_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500">
                @foreach($categories as $category)
                    <option
                        {{$category->id == $product->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="text"
                id="name"
                name="name"
                value="{{$product->name}}">
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="number"
                id="price"
                name="price"
                value="{{$product->price}}">
            <x-input-error :messages="$errors->get('price')" class="mt-2"/>
        </div>

        <div class="mb-4 flex flex-wrap">
            @foreach($tags as $tag)
                <div class=" mr-4 flex items-center">
                    <label class="mr-2" for="scales">{{$tag->name}}</label>
                    <input type="checkbox" id="scales" name="tags[]"
                           {{$product->hasTag($tag->id) ? 'checked' : ''}}
                           value="{{$tag->id}}">
                </div>
            @endforeach
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2"
                   for="description">Description</label>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            <textarea
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="text"
                id="description"
                name="description"
                rows="5">{{$product->name}}
            </textarea>
        </div>

        <div class="mb-4 flex">
            <div class="ml-2 w-10 h-10 mr-2">
                <img class="h-full rounded-full" src="{{$product->photo()}}" alt="image">
            </div>
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="file" id="image" name="image">
            <x-input-error :messages="$errors->get('image')" class="mt-2"/>
        </div>

        <div class="flex justify-between">
            <button
                @click="active = false "
                type="button">
                Close
            </button>
            <button type="submit"
                    class=" btn-primary">
                Save
            </button>
        </div>
    </form>

</div>
