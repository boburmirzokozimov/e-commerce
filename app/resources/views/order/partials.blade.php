<div class="flex flex-col">
    @foreach($products as $key=>$value)
        <div class="flex items-center mr-2 mb-2">
            <div class="flex items-center align-middle">
                <input type="checkbox" id="order" value="{{$value->id}}" name="order[{{$key}}][product_id]"
                       class="border-gray-200 rounded">
                <label for="order" class="label">{{$value->name}}</label>
            </div>
            <input type="number" name="order[{{$key}}][count]" class="border-gray-200 rounded">
        </div>
    @endforeach
</div>
