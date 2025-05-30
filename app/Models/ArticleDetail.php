<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    protected $table = 'article_detail'; //jika nama tabel bukan jamak otomatis
    protected $fillable = ['title', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
