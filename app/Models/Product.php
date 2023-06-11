<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name' ,'slug' , 'quantity', 'price_of_selling', 'price_of_buying', 'price_after_discount', 'description', 'img_one_path', 'img_two_path', 'img_three_path', 'img_four_path',];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
