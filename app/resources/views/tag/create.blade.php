<form action="{{ route('tags.store') }}" method="post">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
        <input
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
            type="text" name="name" id="name">
    </div>
    <div class="flex justify-end">
        <button type="submit" class="btn-primary">Create</button>
    </div>
</form>
