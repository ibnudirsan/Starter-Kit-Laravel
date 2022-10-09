<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class CustomersExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents, WithTitle, WithColumnFormatting, WithChunkReading, WithStyles
{
    protected $number = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = Customer::select('email','firstName','lastName','address','numberPhone','birthDay','age')->get(); 
            return $result;
    }

    /**
     * Importing a large file can have a huge impact on the memory usage,
     * as the library will try to load the entire sheet into memory.
     */
    public function chunkSize(): int {
        return 1000;
    }

    /**
    * Maping data to be exported to excel form.
    *
    * @param [type] $result
    * @return array
    */
    public function map($result): array {
        return [
            ++$this->number,                                                    // A
            empty($result->firstName)   ? '-' : $result->firstName,             // B
            empty($result->lastName)    ? '-' : $result->lastName,              // C
            empty($result->birthDay)    ? '-' : $result->birthDay,              // D
            empty($result->age)         ? '0 Years' : $result->age. " Years",   // E
            empty($result->email)       ? '-' : $result->email,                 // F
            empty($result->numberPhone) ? '-' : $result->numberPhone,           // G
            empty($result->address )    ? '-' : $result->address ,              // H
        ];
    }

    /**
    * Format For Each Column
    *
    * @return array
    */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_TIME6,
        ];
    }

    /**
    * Creating Header in Excel and Report Title
    *
    * @return array
    */
    public function headings(): array
    {
        return [
            [
                'PT. RumahDev Lab.'
            ],
            [
                'Report Customer'
            ],
            [

            ],
                [
                    'No.',
                    'First Name',
                    'Last Name',
                    'Birth Day',
                    'Age',
                    'Email Customer',
                    'Numberphone',
                    'Address',
                ]
            ];
    }

    /**
     * Bold the Header
     *
     * @param Worksheet $sheet
     * @return void
    */
    public function styles(Worksheet $sheet)
     {
        return [
            'A4'  => ['font' => ['bold' => true]],
            'B4'  => ['font' => ['bold' => true]],
            'C4'  => ['font' => ['bold' => true]],
            'D4'  => ['font' => ['bold' => true]],
            'E4'  => ['font' => ['bold' => true]],
            'F4'  => ['font' => ['bold' => true]],
            'G4'  => ['font' => ['bold' => true]],
            'H4'  => ['font' => ['bold' => true]],
        ];
     }

     
     /**
     * Execute the function after
     * the query is executed.
     * @return array
     */
    public function registerEvents(): array
    {
        return [
                AfterSheet::class => function(AfterSheet $event) {
                    /**
                     * Creating Border Lines in Excel.
                     */
                    $styleArray = [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ];

                    /**
                     * Report Title Settings
                     */
                    $cellTittle = 'A1:H1';
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setSize(14);
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setName('Time New Roman');
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setBold(true);
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setUnderline(true);
                    $event->sheet->mergeCells($cellTittle);

                    /**
                     * Report Title Settings
                     */
                    $cellTittle = 'A2:H2';
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setSize(12);
                    $event->sheet->getDelegate()->getStyle($cellTittle)->getFont()->setName('Time New Roman');
                    $event->sheet->mergeCells($cellTittle);

                    /**
                     * Empty Space Cell
                     */
                    $cellTittle = 'A3:H3';
                    $event->sheet->mergeCells($cellTittle);

                    /**
                     * setting AutoFilter
                     */
                    $event->sheet->setAutoFilter('D4:E4');
                    
                    /**
                     * Paper Settings
                     */
                    $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                    $event->sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

                    /**
                     * Header Settings
                     */
                    $cellRange = 'A4:H4';
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Time New Roman');
                    $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
                    $event->sheet->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $event->sheet->getStyle($cellRange)->getFill()->getStartColor()->setARGB('CBC3C3');

                    /**
                     * Query to get the amount of data to be looped
                     */
                    $countData = Customer::select('id')->count();

                    /**
                     * Looping data for setting borders and Fonts in cell data.
                     */
                    for ($i=5; $i <=$countData+4 ; $i++) {
                        $event->sheet->getStyle('A'.$i.':H'.$i)->applyFromArray($styleArray);
                        $event->sheet->getDelegate()->getStyle('A'.$i.':H'.$i)->getFont()->setName('Time New Roman');
                    }
                },
            ];
    }

    public function title(): string
    {
        return 'Report Custumer';
    }

}
