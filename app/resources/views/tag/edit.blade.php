<div x-cloak
     x-show="active == {{$tag->id}}"
     class="w-1/4 my-6 mx-4 px-4 py-6 bg-white rounded-xl shadow absolute right-1/2 z-10 translate-x-[50%]">
    <form action="{{$tag->path()}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="text" name="name" id="name"
                value="{{$tag->name}}">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn-primary">Save</button>
        </div>
    </form>
</div>
