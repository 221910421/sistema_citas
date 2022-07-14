<?php

namespace App\Exports;

use App\Models\Regcitas;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegcitasExport implements FromCollection
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
        return Regcitas::where('id_paciente', 'like', "%$this->crit%")->orwhere('id_doctor', 'like', "%$this->crit%")->orwhere('id_especialidad', 'like', "%$this->crit%")->orwhere('curp_paciente', 'like', "%$this->crit%")->orwhere('estatus_cita', 'like', "%$this->crit%")->orwhere('folio', 'like', "%$this->crit%")->orwhere('fecha_cita', 'like', "%$this->crit%")->orwhere('hora_cita', 'like', "%$this->crit%")->orwhere('id_consultorio', 'like', "%$this->crit%")->get();
    }
}
