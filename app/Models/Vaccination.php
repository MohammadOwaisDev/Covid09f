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
    'vaccine_name',
    'dose_number',
];
    use HasFactory;
}
