<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutAward extends Model
{
    protected $table = 'about_award'; //jika nama tabel bukan jamak otomatis
    protected $fillable = ['title', 'image', 'job', 'description', 'contact', 'about'];
}
