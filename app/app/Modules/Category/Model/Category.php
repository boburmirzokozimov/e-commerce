<?php

namespace App\Modules\Category\Model;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
