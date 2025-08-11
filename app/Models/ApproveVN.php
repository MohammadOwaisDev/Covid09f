<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveVN extends Model
{
    use HasFactory;

      protected $fillable =[
        'patient_id',
        'hospital_id',
        'appointment_id',
        'appointment_date',
        'vaccination_name',
        'dose_number',
        'vaccination_status',
        'status',
    ];

       public function patient() {
    return $this->belongsTo(Patient::class);
}

public function hospital() {
    return $this->belongsTo(Hospital::class);
}
}
