<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Order extends Model
{
    use SoftDeletes, Userstamps;

    protected $table = "orders";

    protected $fillable = [
        'product_id',
        'amount',
        'quantity',
        'note'
    ];

    protected $guarded = [
        'price',
        'purchase_price',
        'unit'
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
