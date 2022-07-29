<?php

namespace App\Exports;

use App\Models\m_batt;
use Maatwebsite\Excel\Concerns\FromCollection;

class mbattsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return m_batt::all();
    }
}