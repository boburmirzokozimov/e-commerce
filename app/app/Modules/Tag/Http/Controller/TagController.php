<?php

namespace App\Modules\Tag\Http\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Tag\Http\Request\CreateRequest;
use App\Modules\Tag\Http\Request\UpdateRequest;
use App\Modules\Tag\Model\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index', ['tags' => Tag::all()]);
    }

    public function store(CreateRequest $request)
    {
        Tag::query()->create($request->validated());

        return back()->with('success', 'Successfully added');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('success', 'Successfully updated');
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return back()->with('success', 'Successfully updated');
    }
}
