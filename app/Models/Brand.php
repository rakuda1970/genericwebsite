<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'slug', 'sort_order'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_brand_assignments',
            'brand_id',
            'item_serial'
        );
    }
}
