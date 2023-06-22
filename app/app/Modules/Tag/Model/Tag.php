<?php

namespace App\Modules\Tag\Model;

use App\Modules\CustomModel;
use App\Modules\Product\Model\Product;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
