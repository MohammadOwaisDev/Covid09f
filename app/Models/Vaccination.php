<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{

   public function appointment(){
    return $this->belongsTo(Appointment::class);
}
    
    protected $fillable = [
    'appointment_id',
    'hospital_id',
    'vaccination_name',
    'dose_number',
    'vaccination_status',
];
    use HasFactory;
}
