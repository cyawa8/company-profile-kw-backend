<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_category'; // jika nama tabel bukan jamak otomatis
    protected $fillable = ['title'];

    public function articles()
    {
        return $this->hasMany(ArticleDetail::class, 'category_id');
    }
}
