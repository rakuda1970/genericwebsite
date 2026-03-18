<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'slug', 'type', 'sort_order'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_category_assignments',
            'category_id',
            'item_serial'
        );
    }
}
