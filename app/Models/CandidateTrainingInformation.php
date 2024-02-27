<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateTrainingInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_name',
        'institution_name',
        'completion_year',
        'training_number'
    ];
}
