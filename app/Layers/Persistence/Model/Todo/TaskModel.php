<?php

namespace App\Layers\Persistence\Model\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Persistence\Entity\Todo\TaskPersistence;

class taskModel
{
    public function toDomain(taskPersistence $taskPersistence): TaskDomain
    {
        return new TaskDomain(
            $taskPersistence->getId(),
            $taskPersistence->getFlag(),
            $taskPersistence->getTitle(),
            $taskPersistence->getCompletionDate(),
            $taskPersistence->getCompletionTime()
        );
    }
    public function fromDomain(TaskDomain $task): TaskPersistence
    {
        return new TaskPersistence(
            $task->getTaskId(),
            $task->getTaskFlag(),
            $task->getTaskTitle(),
            $task->getTaskCompletionDate(),
            $task->getTaskCompletionTime()
        );
    }
}
