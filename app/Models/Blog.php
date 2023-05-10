<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'thumb',
        'category_blog_id',
        'active',
        "slug"
    ];
    public function category()
    {
        return $this->hasOne(CategoryBlog::class, 'id', 'category_blog_id')->withDefault(['name' => '']);
    }
}
