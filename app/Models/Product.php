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
        "description",
        "price",
        "quantity"
    ];

    // Relasi ke product category
    public function product_category(){
        $this->belongsTo(ProductCategory::class, "product_kategori_id", "id");
    }

    // Relasi ke galleri product
    public function galleri_product(){
        $this->hasMany(GalleryProduct::class, "product_id", "id");
    }
}
