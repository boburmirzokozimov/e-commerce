<?php

namespace App\Modules\Order\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Category\Model\Category;
use App\Modules\Order\Http\Request\CreateRequest;
use App\Modules\Order\Http\Request\UpdateRequest;
use App\Modules\Order\Model\Order;
use App\Modules\Order\UseCase;
use App\Modules\Product\Model\Product;
use Exception;


class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', ['categories' => Category::all(), 'orders' => Order::all()]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('success', 'Order deleted successfully');
    }

    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function store(CreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::fromRequest($request);
            $handler->handle($command);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Successfully created order');
    }

    public function update(UpdateRequest $request, Order $order, UseCase\Update\Handler $handler)
    {
        try {
            $command = UseCase\Update\Command::fromRequest($request, $order->id);
            $handler->handle($command);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
        return redirect(route('orders'))->with('success', 'Successfully created order');
    }

    public function partials()
    {
        $products = Product::all()->where('category_id', request()->query->get('category'));

        return view('order.partials', ['products' => $products]);
    }
}
