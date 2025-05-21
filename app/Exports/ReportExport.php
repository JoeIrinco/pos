<?php

namespace App\Exports;

use App\StoreOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(StoreOrder::getSalesJournal());
    }
    public function headings():array{

        return[
            'DATE',
            'REF NUMBER',
            'CUSTOMER NAME',
            'AMOUNT',
            'VAT',
            'NET OF VAT',
            /* 'WITHHOLDING TAX', */
            'VAT-EXEMPT SALES',
            'ZERO-RATED SALES',
            'SC/PWD DISC (20%)',
            'TRANSACTION TYPE',
            'ADDRESS',
            'SC / PWD ID NO.',
            'REMARKS'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:M1')
                    ->getFont()
                    ->setBold(true);

            },
        ];
    }
}
