<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'address',
        'payment',
        'price_amount',
        'shipping_price',
        'status'
    ];

    // Rrelasi Ke User
    public function User()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    /**
     * Get all of the Items for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Items()
    {
        return $this->hasMany(TransactionItem::class, "transaction_id", "id");
    }
}
