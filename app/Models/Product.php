<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'category_id',
        'stock',
    ];


    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
