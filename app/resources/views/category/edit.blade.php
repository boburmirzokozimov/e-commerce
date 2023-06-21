<div
    x-show="active == '{{$category->id}}'"
    x-if="active == '{{$category->id}}'"
    @click.away="active = false"
    class="absolute right-[50%] top-1/2  translate-x-[50%] translate-y-[-50%] pointer-events-auto flex w-[400px]  px-4 py-6 flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
    <form action="{{$category->path()}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <h4 class="mb-4">Edit a category</h4>
        <hr class="mb-4">
        <div class="mb-4">
            <label for="title">Title</label><input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="text"
                name="title"
                id="title"
                value="{{$category->title}}">
        </div>
        <div class="mb-4 flex ">
            <div class="ml-2 w-10 h-10 mr-2">
                <img class="h-full rounded-full" src="{{$category->photo()}}" alt="photo">
            </div>
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="file" id="photo" name="photo">
        </div>
        <div class="mb-4 flex ">
            <input
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="hidden" name="id" id="" value="{{$category->id}}">
        </div>
        <div class="mb-4">
            <label for="description">Description</label><textarea
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                type="text" name="description" id="description"
                rows="3">
            {{$category->description}}
            </textarea>
        </div>

        <div class="flex justify-between">
            <button type="button" @click="active = false">Close</button>
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>
</div>
