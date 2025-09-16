<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'short_description',
        'description',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('status', true)->with('children'); // Aktif alt kategorileri alır ve alt kategorilerin alt kategorilerini de yükler.
    }
}
