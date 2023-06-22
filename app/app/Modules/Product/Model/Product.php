<?php

namespace App\Modules\Product\Model;

use App\Modules\Category\Model\Category;
use App\Modules\CustomModel;
use App\Modules\Tag\Model\Tag;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends CustomModel
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

    public function photo(): string
    {
        return '/storage/' . $this->image;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function hasTag(int $id): bool
    {
        return $this->tags()->where('tag_id', $id)->exists();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
