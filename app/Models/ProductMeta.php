<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $table = 'product_meta';
    protected $primaryKey = 'item_serial';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'item_serial',
        'keywords',
        'meta_description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'item_serial', 'item_serial');
    }
}
