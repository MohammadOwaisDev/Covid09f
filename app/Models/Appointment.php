<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
   public function patient(){
     return $this->belongsTo(Patient::class);
   }
   
  public function testDetails() {
    return $this->hasOne(covid_test::class);
}

  public function vaccineDetails() {
    return $this->hasOne(Vaccination::class);
}






use HasFactory;
    
}
