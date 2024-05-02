<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use App\Layers\UseCase\Todo\GetAllTasksUseCase;
use App\Layers\Presentation\View\Todo\TaskView;

class ResultsExport implements FromCollection, WithCustomCsvSettings, WithHeadings, WithStyles
{
    private TaskView $_taskView;
    private GetAllTasksUseCase $_getAllTasksUseCase;

     public function __construct(
        TaskView $taskView,
        GetAllTasksUseCase $getAllTasksUseCase)
     {
         $this->_taskView = $taskView;
         $this->_getAllTasksUseCase = $getAllTasksUseCase;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [ 1 => ['font' => ['bold' => true]]];
    }

    public function headings(): array
    {
        return [
            'Номер места',
            'Имя пилота',
            'Город пилота',
            'Автомобиль',
            'Попытка 1',
            'Попытка 2',
            'Попытка 3',
            'Попытка 4',
            'Сумма очков',
        ];
    }

    public function collection()
    {
        $tasks = $this->_taskView->toArray(
            $this->_getAllTasksUseCase->getAll()
        );
        return collect($this->_taskView->sort($tasks));
    }
}
