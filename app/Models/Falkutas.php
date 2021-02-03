<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falkutas extends Model
{
    use HasFactory;

    protected $guarded=['created_at','updated_at','id'];

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
