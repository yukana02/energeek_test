<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;


    protected $fillable = [
        'jobs_id',
        'name',
        'email',
        'phone',
        'year',
    ];
}
