<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Asisst;
use Maatwebsite\Excel\Concerns\ToModel;

class AsisstsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asisst([
            //'fecha_hora' => Carbon::parse($row[0])->format('Y-m-d H:i:s'),
            'fecha_hora' => Carbon::createFromFormat('d/m/Y H:i:s', $row[0])->format('Y-m-d H:i:s'),
            //'fecha_hora' => $row[0],
            'tipo'    => $row[1], 
            'employee_id' => $row[2],
        ]);
    }
}
