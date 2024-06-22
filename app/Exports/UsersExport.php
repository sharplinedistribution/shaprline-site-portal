<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection,WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
        ];
    }

    function __construct($data) {
        $this->data = $data;
    }

    public function collection()
    {
        $data = $this->data;

        $query =  User::where('id', '!=', 0);
        if(isset($data->start_date) && isset($data->end_date)){
            $query = $query->where('created_at', '>=', $data->start_date)->where('created_at','<=', $data->end_date);
        }
        if(isset($data->type)){
            $query = $query->where('is_subscribed', $data->type);
        }
        $query= $query->select('first_name','last_name','email');
        $query = $query->get();

        return  $query;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:C1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FBDA03');
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(35);



            },
        ];
    }
}
