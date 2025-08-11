<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveCT extends Model
{
    use HasFactory;

    protected $fillable =[
        'patient_id',
        'hospital_id',
        'appointment_id',
        'appointment_date',
        'test_type',
        'symptoms',
        'test_result', 
        'test_result_date',
        'status',
    ];

    public function patient() {
    return $this->belongsTo(Patient::class);
}

public function hospital() {
    return $this->belongsTo(Hospital::class);
}
}
