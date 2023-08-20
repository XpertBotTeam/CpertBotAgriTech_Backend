<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    public function photos()
    {
        return $this->belongsToMany(Photo::class,'diseasephotos','diseas_id','photo_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function knowledge_bases()
    {
        return $this->hasMany(Knowledge_Base::class);
    }

}
