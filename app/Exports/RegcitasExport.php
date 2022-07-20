<?php

namespace App\Exports;

use App\Models\citas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class RegcitasExport implements FromCollection,
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //variable
    protected $crit;
    //metodo
    function __construct($crit){
        $this->crit = $crit;
    }


    public function collection()
    {
        return citas::where('id_paciente', 'like', "%$this->crit%")->orwhere('id_doctor', 'like', "%$this->crit%")->orwhere('id_especialidad', 'like', "%$this->crit%")->orwhere('curp_paciente', 'like', "%$this->crit%")->orwhere('estatus_cita', 'like', "%$this->crit%")->orwhere('folio', 'like', "%$this->crit%")->orwhere('fecha_cita', 'like', "%$this->crit%")->orwhere('hora_cita', 'like', "%$this->crit%")->orwhere('id_consultorio', 'like', "%$this->crit%")->get();
    }

    public function headings(): array
    {
        return [
            'id_paciente', 
            'id_doctor', 
            'id_especialidad', 
            'curp_paciente', 
            'estatus_cita', 
            'folio', 
            'fecha_cita', 
            'hora_cita', 
            'id_consultorio'];
    }

}
