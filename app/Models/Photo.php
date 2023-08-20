<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    public function disease()
    {
        return $this->belongsToMany(Disease::class,'disease_photos','photo_id','disease_id');
    }
}
