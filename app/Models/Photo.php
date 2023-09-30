<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable =['caption','plantName','image','name','image_url'];
    public function disease()
    {
        return $this->belongsToMany(Disease::class,'disease_photos','photo_id','disease_id');
    }
}
