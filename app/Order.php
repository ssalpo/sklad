<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = "orders";

    protected $fillable = [
        'product_id',
        'amount',
        'quantity',
        'note'
    ];

    protected $guarded = [
        'price',
        'retail_price',
        'created_by',
        'unit'
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
