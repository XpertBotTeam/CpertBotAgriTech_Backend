<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    protected $fillable =['pesticides','organic_remedies'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

}
