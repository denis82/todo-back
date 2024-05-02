<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\GetAllTasksInterface;

class GetAllTasksUseCase
{
    private GetAllTasksInterface $_getAllTasks;

    public function __construct(GetAllTasksInterface $getTaskById)
    {
         $this->_getAllTasks = $getTaskById;
    }

    public function getAll(): array
    {
         return $this->_getAllTasks->getAll();
    }
}
