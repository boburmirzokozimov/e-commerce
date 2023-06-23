<?php

namespace App\Modules\Order\Model;

use App\Modules\CustomModel;
use App\Modules\Product\Model\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Order extends CustomModel
{
    use HasFactory;

    public function addProducts(array $order): self
    {
        $this->products()->sync($order);
        return $this;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getTotalPrice(): self
    {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->pivot->count * $product->price;
        }

        $this->price = $sum;

        return $this;
    }
}
