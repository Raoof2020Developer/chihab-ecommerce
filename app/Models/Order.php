<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_client', 'phone_number', 'client_wilaya', 'client_baladiya', 'quantity_ordered', 'product_id'];
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
