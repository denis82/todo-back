<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\TaskBuilder;
use App\Layers\Domain\Todo\Dto\UpdateTaskDto;
use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Domain\Todo\UpdateTaskInterface;

class UpdateTaskUseCase
{
    private TaskBuilder $_taskBuilder;
    private UpdateTaskInterface $_updateTask;

    public function __construct(TaskBuilder $taskBuilder, UpdateTaskInterface $updateTask)
    {
        $this->_taskBuilder = $taskBuilder;
        $this->_updateTask = $updateTask;
    }

    public function update(UpdateTaskDto $updateTaskDto, int $id): TaskDomain
    {
        $task = $this->_taskBuilder->update($updateTaskDto);
        return $this->_updateTask->save($task, $id);
    }
}
