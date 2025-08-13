<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveVN extends Model
{
    use HasFactory;

      protected $fillable =[
        'patient_id',
        'patient_name',
        'hospital_id',
        'hospital_name',
        'appointment_id',
        'appointment_date',
        'vaccination_name',
        'dose_number',
        'vaccination_result',
        'vaccination_result_date',
        'status',
    ];

       public function patient() {
    return $this->belongsTo(Patient::class);
}

public function hospital() {
    return $this->belongsTo(Hospital::class);
}
}
