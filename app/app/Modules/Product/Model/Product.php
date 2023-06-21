<?php

namespace App\Modules\Product\Model;

use App\Modules\Category\Model\Category;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function path(): string
    {
        return 'admin/products/' . $this->id;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
