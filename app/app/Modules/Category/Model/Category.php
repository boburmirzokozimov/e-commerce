<?php

namespace App\Modules\Category\Model;

use App\Modules\Product\Model\Product;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function path(): string
    {
        return '/admin/categories/' . $this->id;
    }

    public function photo(): string
    {
        return '/storage/' . $this->photo;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->latest();
    }
}
