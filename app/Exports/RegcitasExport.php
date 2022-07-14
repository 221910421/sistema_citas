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
        return Regcitas::all();
    }
}
