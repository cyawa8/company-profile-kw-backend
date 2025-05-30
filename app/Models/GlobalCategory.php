<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalCategory extends Model
{
    protected $table = 'global_category'; // jika nama tabel bukan jamak otomatis
    protected $fillable = ['title_category', 'description'];

    public function category()
    {
        return $this->belongsTo(GlobalDetail::class, 'global_category_id');
    }
}
