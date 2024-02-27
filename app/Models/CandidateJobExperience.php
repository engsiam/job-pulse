<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateJobExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'designation',
        'company_name',
        'joining_date',
        'depareture_date',
        'experience_number'
    ];
}
