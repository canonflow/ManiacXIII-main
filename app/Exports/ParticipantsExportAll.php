<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ParticipantsExportAll implements WithMultipleSheets
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function sheets(): array
    {
        $listStatus = ['verified', 'waiting'];
        $sheets = [];

        foreach ($listStatus as $status) {
            $sheets[] = new ParticipantsExport($status);
        }

        return $sheets;
    }
}
