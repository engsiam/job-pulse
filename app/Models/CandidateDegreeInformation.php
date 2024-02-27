<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateDegreeInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'degree_type',
        'university_name',
        'department',
        'passing_year',
        'cgpa',
        'degree_number'
    ];
}
