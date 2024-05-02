<?php

namespace App\Framework\Di;

use App\Layers\Domain\Todo\DeleteTasksInterface;
use App\Layers\Domain\Todo\GetTaskByIdInterface;
use App\Layers\Domain\Todo\GetAllTasksInterface;
use App\Layers\Domain\Todo\SaveNewTaskInterface;
use App\Layers\Domain\Todo\UpdateTaskInterface;
use App\Layers\Persistence\Action\Todo\DeleteTaskAction;
use App\Layers\Persistence\Action\Todo\GetTaskByIdAction;
use App\Layers\Persistence\Action\Todo\GetAllTasksAction;
use App\Layers\Persistence\Action\Todo\SaveNewTaskAction;
use App\Layers\Persistence\Action\Todo\UpdateTaskAction;

class Todo
{
    public function __invoke(): array
    {
        return [
            UpdateTaskInterface::class  => UpdateTaskAction::class,
            DeleteTasksInterface::class => DeleteTaskAction::class,
            SaveNewTaskInterface::class => SaveNewTaskAction::class,
            GetAllTasksInterface::class => GetAllTasksAction::class,
            GetTaskByIdInterface::class => GetTaskByIdAction::class,
        ];
    }
}
