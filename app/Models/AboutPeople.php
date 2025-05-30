<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPeople extends Model
{
    protected $table = 'about_people'; //jika nama tabel bukan jamak otomatis
    protected $fillable = ['name', 'birth_date', 'job', 'description', 'contact', 'about'];
}
