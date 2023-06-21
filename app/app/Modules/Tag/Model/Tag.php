<?php

namespace App\Modules\Tag\Model;

use App\Modules\CustomModel;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends CustomModel
{
    use HasFactory;

    protected static function newFactory()
    {
        return TagFactory::new();
    }

    public function path(): string
    {
        return '/admin/tags/' . $this->id;
    }
}
