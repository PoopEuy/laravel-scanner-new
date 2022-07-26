<?php

namespace App\Exports;

use App\Models\m_batts;
use Maatwebsite\Excel\Concerns\FromCollection;

class mbattsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return m_batts::all();
    }
}
