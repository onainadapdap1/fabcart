<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'sub_category_id',
        'name',
        'url',
        'small_description',
        'image',
        'p_highlight_heading',
        'p_highlights',
        'p_description_heading',
        'p_description',
        'p_details_heading',
        'p_details',
        'sale_tag',
        'original_price',
        'offer_price',
        'quantity',
        'priority',
        'new_arrival_products',
        'featured_products',
        'popular_products',
        'offers_products',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',

    ];
}
