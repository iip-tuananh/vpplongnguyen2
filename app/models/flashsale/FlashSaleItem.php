<?php

namespace App\models\flashsale;

use App\models\product\Product;
use Illuminate\Database\Eloquent\Model;

class FlashSaleItem extends Model
{
    protected $table = "flash_sale_items";

    public function flashsale() {
        return $this->belongsTo(Flashsale::class,'flash_sale_id');
    }

    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }
}
