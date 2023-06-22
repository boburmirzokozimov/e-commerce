<?php

namespace App\Modules\Product\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Category\Model\Category;
use App\Modules\Product\Http\Request\CreateRequest;
use App\Modules\Product\Http\Request\DeleteRequest;
use App\Modules\Product\Http\Request\UpdateRequest;
use App\Modules\Product\Model\Product;
use App\Modules\Product\UseCase;
use App\Modules\Tag\Model\Tag;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('product.create', ['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function store(CreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::fromRequest($request);
            $handler->handle($command);
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage(), $e->getTrace());
            return back()->with('error', 'Oops! Something went wrong');
        }
        return redirect(route('products'))->with('success', 'Successfully created product');
    }

    public function update(UpdateRequest $request, UseCase\Update\Handler $handler)
    {
        try {
            $command = UseCase\Update\Command::fromRequest($request);
            $handler->handle($command);
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage(), $e->getTrace());
            return back()->with('error', 'Oops! Something went wrong');
        }
        return redirect(route('products'))->with('success', 'Successfully updated product');
    }

    public function destroy(DeleteRequest $request, Product $product, UseCase\Delete\Handler $handler)
    {
        try {
            $command = UseCase\Delete\Command::fromRequest($request);
            $handler->handle($command);
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage(), $e->getTrace());
            return back()->with('error', 'Oops! Something went wrong');
        }
        return back()->with('success', 'Successfully deleted the product');
    }
}
