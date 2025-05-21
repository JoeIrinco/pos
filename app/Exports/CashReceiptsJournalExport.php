<?php

namespace App\Exports;

use App\StoreOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CashReceiptsJournalExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(StoreOrder::getCashReceiptsJournal());
    }
    public function headings():array{
        return[
            'O.R DATE',
            'O.R NO.',
            'CUSTOMER',
            'DESCRIPTION',
            'TOTAL PAYMENT',
            'WITHHOLDING TAX',
            'FREIGHT',
            'SC',
            'LATE DELIVERY CHARGE',
            'DISCOUNT',
            'CASH',
            'CHECK',
            'CARD',
            'GCASH',
            'DEPOSIT',
            'ONLINE BANK TRANSFER',
            'PAYMAYA',
            'BANK NAME',
            'CHECK NO.',
            'CHECK DATE',
            'SUBMITTED 2307',
            'INVOICE DATE',
            'INVOICE AMOUNT',
            'REMARKS',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                
                $event->sheet->getDelegate()->getStyle('A1:X1')
                    ->getFont()
                    ->setBold(true);
                ;
            },
        ];
    }

}
