<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'item_serial';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'item_serial',
        'item_master_id',
        'item_brand_id',
        'item_description',
        'item_length',
        'item_width',
        'item_height',
        'item_diameter',
        'item_weight',
        'material',
        'updated_at',
        'product_year',
    ];

    protected $casts = [
        'item_serial'   => 'integer',
        'item_length'   => 'double',
        'item_width'    => 'double',
        'item_height'   => 'double',
        'item_diameter' => 'double',
        'item_weight'   => 'double',
        'updated_at'    => 'datetime',
        'product_year'  => 'integer',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'product_category_assignments',
            'item_serial',
            'category_id'
        );
    }

    public function brands()
    {
        return $this->belongsToMany(
            Brand::class,
            'product_brand_assignments',
            'item_serial',
            'brand_id'
        );
    }

    public function collections()
    {
        return $this->belongsToMany(
            Collection::class,
            'product_collection_assignments',
            'item_serial',
            'collection_id'
        );
    }

    public function meta()
    {
        return $this->hasOne(ProductMeta::class, 'item_serial', 'item_serial');
    }
}
