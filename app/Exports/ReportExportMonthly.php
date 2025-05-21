<?php

namespace App\Exports;

use App\StoreOrderMonthly;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExportMonthly implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(StoreOrderMonthly::getMonthlyReport());
    }
    public function headings():array{
        return[
            'Transaction',
            'Transaction No.',
            'Date',
            'Customer',
            'Payment',
            'Amount',
        ];
    }
}
