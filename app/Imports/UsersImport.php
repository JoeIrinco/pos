<?php

namespace App\Imports;

use App\Models\tmmData;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        
         new tmmData([
         'product_code' => $row[0],
         'brand' => $row[1],
         'product_name' => $row[2],
         'produc_desc' => $row[3],
         'qty' => $row[4],
         'unit' => $row[5],
         'cost' => $row[6],
         'location' => $row[7],
         'rack' => $row[8],
         'shelf' => $row[9],
         'critical' => $row[10],
         'exp_date'=> "",
         'lot_no' => $row[12],]
        
            );
            
    }

    public function transformDate($value, $format = 'Y-m-d')
{
    if(isset($value)){
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
   
}
}
