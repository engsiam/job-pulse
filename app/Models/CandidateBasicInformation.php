<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateBasicInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'father_name',
        'mother_name',
        'blood_group',
        'phone',
        'github_link',
        'portfolio_website',
        'skill',
        'current_salary',
        'expected_salary',
        'user_id'
    ];
}
