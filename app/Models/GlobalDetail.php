<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalDetail extends Model
{
    protected $table = 'global_category'; // jika nama tabel bukan jamak otomatis
    protected $fillable = ['description', 'started', 'employees', 'assets'];

    public function global()
    {
        return $this->hasMany(GlobalDetail::class, 'global_category_id');
    }
}
