<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

  use HasFactory;


protected $fillable = [
    'patient_id',
    'appointment_type',
    'appointment_date',
    'hospital_id', // ✅ Add this
];

   public function patient(){
     return $this->belongsTo(Patient::class);
   }
   
  public function testDetails() {
    return $this->hasOne(Covid_test::class, 'appointment_id', 'id');
}

  public function vaccineDetails() {
    return $this->hasOne(Vaccination::class, 'appointment_id', 'id');
}







    
}
