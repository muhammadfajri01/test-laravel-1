<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    use HasFactory;

    public function Users()
    {
        return $this->belongsToMany(User::class,'users_assets');
    }
}
