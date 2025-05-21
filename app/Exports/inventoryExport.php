<?php

namespace App\Exports;

use App\StoreOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class inventoryExport implements FromCollection,WithHeadings
{
    

    private $data;
    private $sheetName;
    private $keysData;
    public function __construct(string $data){
        $this->data = $data;
    }
    public function collection()
    {
         return new Collection(json_decode($this->data));
    }

    public function title():String{
        return$this->sheetName;
    }

    public function headings(): array
    {
        
       $keys;
        foreach (json_decode($this->data) as $collectData) {   
            $keys=json_decode(collect($collectData)->keys());
           
           if (count($keys) > 0) 
            {
                return $keys;
                break;
            } 
            else
            {
                break;
            }
           
        }
        return [];
    }

    /* 
    public function headings():array{
        return[
            'DATE',
            'VOUCHER NO.',
            'REF NUMBER',
            'REF NO. DATE',
            'VENDOR',
            'GL ACCOUNT',
            'DESCRIPTION',
            'AMOUNT',
            'STATUS',
            'CHECK DATE',
            'PAYMENT METHOD',
            'BANK NAME',
            'RECEIVE BY',
            'ADDRESS',
            'TIN',
            'REMARKS',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $event->sheet->getDelegate()->getStyle('A1:X1')
                    ->getFont()
                    ->setBold(true);
                ;
            },
        ];
    }
 */
}
