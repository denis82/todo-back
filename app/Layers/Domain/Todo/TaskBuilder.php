<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Dto\CreateTaskDto;
use App\Layers\Domain\Todo\Dto\UpdateTaskDto;
use App\Layers\Domain\Todo\Entity\TaskDomain;

class TaskBuilder
{
    private GetTaskByIdInterface $getTaskById;
    public function __construct(GetTaskByIdInterface $getTaskById)
    {
        $this->getTaskById = $getTaskById;
    }

    public function make(CreateTaskDto $createTaskDto): TaskDomain
    {
        return new TaskDomain(
            null,
            null,
            $createTaskDto->getTitle(),
            $createTaskDto->completionDate(),
            $createTaskDto->completionTime()
        );
    }

    public function update(UpdateTaskDto $updateTaskDto): TaskDomain
    {
        return new TaskDomain(
            $updateTaskDto->getId(),
            $updateTaskDto->getTaskFlag(),
            $updateTaskDto->getTaskTitle(),
            $updateTaskDto->completionDate(),
            $updateTaskDto->completionTime()
        );
    }
    public function delete(int $id): int
    {
        $task = $this->getTaskById->get($id);
        return $task->getTaskFlag();
    }
}
