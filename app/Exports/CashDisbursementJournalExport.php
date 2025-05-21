<?php

namespace App\Exports;

use App\StoreOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CashDisbursementJournalExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(StoreOrder::getCashDisbursement());
    }
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

}
