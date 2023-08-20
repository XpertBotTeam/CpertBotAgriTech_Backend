<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge_Base extends Model
{
    use HasFactory;
    
    public function disease()  {
        return $this->hasOne(Disease::class);
    }
}
