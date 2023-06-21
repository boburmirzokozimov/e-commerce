<?php

namespace App\Modules\Category\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Category\Http\Request\CreateRequest;
use App\Modules\Category\Http\Request\UpdateRequest;
use App\Modules\Category\Model\Category;
use App\Modules\Category\UseCase;
use Exception;

class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
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
        return redirect(route('categories'))->with('success', 'Successfully created category');
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
        return redirect(route('categories'))->with('success', 'Successfully deleted category');
    }
}
