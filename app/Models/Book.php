<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'author', 'category_id', 'photo', 'file', 'pages', 'data'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
