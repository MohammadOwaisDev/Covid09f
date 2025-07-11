<?php

namespace App\Exports;

use App\Models\Patientreg;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class patientregEx implements FromCollection,withHeadings
{
    
    public function collection()
    {
        return collect(Patientreg::getallpatientreg());
    }
    public function headings():array{
        return [
           "id",
           "Pname",
           "Pemail",
           "Ppassword",
           "Pphone",
           "Paddress",
           "Pnic",
           "Pvreason",
           "Pgender"
        ];
    }

}
$youclassInstance = new patientregEx();

$headings = $youclassInstance->headings();

foreach($headings as $heading){
    echo $heading . "<br>";
}