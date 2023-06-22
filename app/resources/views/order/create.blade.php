<form action="/admin/orders" method="post" class="card">
    @csrf
    <div class="mb-4">
        <label for="category">Choose Category</label>
        <select id="category" onchange="fetchProducts()">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    </div>

    <div id="products" class="mb-4">
    </div>

    <div class="mb-4">
        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name"
               class="input">
    </div>
    <div class="mb-4">
        <label for="phone" class="label">Phone</label>
        <input type="text" name="phone" id="phone"
               class="input">
    </div>

    <div class="flex justify-end">
        <button type="submit" class="btn-primary ">
            Create
        </button>
    </div>
</form>

<script>
    fetchProducts()

    function fetchProducts() {
        const val = document.getElementById('category').value
        const products = document.getElementById('products')

        fetch(`/admin/orders/partials?category=${val}`)
            .then(res => res.text())
            .then(res => products.innerHTML = res)
    }
</script>
<script type="module" src="https://unpkg.com/@github/include-fragment-element"></script>
