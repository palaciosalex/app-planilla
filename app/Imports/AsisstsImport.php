<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Asisst;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithMapping;

class AsisstsImport implements ToModel, WithHeadingRow, WithValidation, WithMapping
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
            //'fecha_hora' => Carbon::createFromFormat('d/m/Y H:i:s', $row[0])->format('Y-m-d H:i:s'),
            //'fecha_hora' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_hora']),
            'fecha_hora' => $row['fecha_hora'],
            'tipo'    => $row['tipo'], 
            'employee_id' => $row['id_trabajador'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.fecha_hora' => [
                'required',
                'date'
            ],
            '*.tipo' => [
                'required',
                'in:entrada,salida'
            ],
            '*.id_trabajador' => [
                'required',
                'integer',
                'exists:employees,id'
            ],
        ];
    }

    public function map($row): array
    {      
        
        if(gettype($row['fecha_hora']) == 'double'){            
           $row['fecha_hora'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_hora']); 
        }
        else{
           //$row['fecha_hora'] = Carbon::createFromFormat('d/m/Y H:i:s', $row['fecha_hora'])->format('Y-m-d H:i:s');
            //...
    
        }
        $row['tipo'] = strtolower($row['tipo']); 

        
        return $row;
    }
}
