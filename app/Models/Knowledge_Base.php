<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge_Base extends Model
{
    use HasFactory;
    protected $fillable = ['pests','best_practice'];
    public function disease()  {
        return $this->hasOne(Disease::class);
    }
}
