<?php

namespace App\Modules\Product\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Product\Http\Request\CreateRequest;
use App\Modules\Product\Http\Request\UpdateRequest;
use App\Modules\Product\UseCase;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
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
}
