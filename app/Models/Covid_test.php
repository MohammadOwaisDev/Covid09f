<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid_test extends Model
{

  public function appointment(){
    return $this->belongsTo(Appointment::class);
}


    protected $fillable = [
    'patient_id',
    'appointment_id',
    'appointment_date',
    'hospital_id',
    'symptoms',
    'test_type',
];
    use HasFactory;
}
