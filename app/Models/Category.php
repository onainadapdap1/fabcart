<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\TextUI\XmlConfiguration\Group;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'group_id',
        'name',
        'description',
        'image',
        'icon',
        'status'
    ];

    // belongsTo relation in laravel
    public function group() {
        return $this->belongsTo(Groups::class, 'group_id', 'id');
    }
}
