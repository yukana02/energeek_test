<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skillsets extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'candidates_id',
        'skills_id' ,
    ];
}
