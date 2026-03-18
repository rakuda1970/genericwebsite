<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'slug', 'sort_order'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_collection_assignments',
            'collection_id',
            'item_serial'
        );
    }
}
