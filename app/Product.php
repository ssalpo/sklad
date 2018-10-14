<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        'name',
        'price',
        'retail_price',
        'quantity',
        'unit'
    ];

    protected $guarded = ['created_by', 'edited_by'];

    protected $dates = ['deleted_at'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
