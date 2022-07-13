<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "user_id",
        "products_id",
        "transaction_id",
        "quantity",
    ];

    public function Product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }
}
