<?php

namespace App\Modules\Order\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Category\Model\Category;
use App\Modules\Order\Http\Request\CreateRequest;
use App\Modules\Order\Model\Order;
use App\Modules\Product\Model\Product;

class OrderController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('order.index', ['categories' => $categories, 'orders' => Order::all()]);
    }

    public function store(CreateRequest $request)
    {
        $order = Order::create([
            'name' => $request->validated('name'),
            'price' => $request->validated('price'),
            'phone' => $request->validated('phone'),
        ]);

        $order->products()->attach($request->validated('order'));

        $sum = 0;

        foreach ($order->products as $product) {
            $sum += $product->pivot->count * $product->price;
        }

        $order->price = $sum;
        $order->save();

        return back();
    }

    public function partials()
    {
        $products = Product::all()->where('category_id', request()->query->get('category'));

        return view('order.partials', ['products' => $products]);
    }
}
