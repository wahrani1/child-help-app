<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'location',
        'latitude',
        'longitude',
        'description',
        'emergency_level',
        'child_age_group',
        'status'
    ];
}
