<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Domain\Todo\UpdateTaskInterface;
use App\Layers\Persistence\Model\Todo\TaskModel;
use App\Layers\Persistence\Repository\Todo\TaskRepository;

class UpdateTaskAction implements UpdateTaskInterface
{
    private TaskModel $taskModel;
    private TaskRepository $taskRepository;

    public function __construct(
        TaskModel $taskModel,
        TaskRepository $taskRepository)
    {
        $this->taskModel = $taskModel;
        $this->taskRepository = $taskRepository;
    }

    public function save(TaskDomain $task, int $id): TaskDomain
    {
        $result = $this->taskRepository->updateTask(
            $this->taskModel->fromDomain($task),
            $id
        );
        return $this->taskModel->toDomain($result);
    }
}
