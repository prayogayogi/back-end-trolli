<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "type",
        "heavy",
        "condition",
        "product_kategori_id",
        'user_id',
        "description",
        "price",
        "quantity"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // Relasi ke product category
    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class, "product_kategori_id", "id");
    }

    // Relasi ke galleri product
    public function GalleryProduct()
    {
        return $this->hasMany(GalleriProduct::class, "product_id", "id");
    }

    // Relasi ke galleri product
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
