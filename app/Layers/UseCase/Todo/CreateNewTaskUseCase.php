<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\TaskBuilder;
use App\Layers\Domain\Todo\Dto\CreateTaskDto;
use App\Layers\Domain\Todo\SaveNewTaskInterface;

class CreateNewTaskUseCase
{
    private TaskBuilder $_taskBuilder;
    private SaveNewTaskInterface $_saveTask;

    public function __construct(TaskBuilder $taskBuilder, SaveNewTaskInterface $saveTask)
    {
        $this->_saveTask = $saveTask;
        $this->_taskBuilder = $taskBuilder;
    }

    public function create(CreateTaskDto $createTaskDto): void
    {
        $task = $this->_taskBuilder->make($createTaskDto);
        $this->_saveTask->save($task);
    }
}
