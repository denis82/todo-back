<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Domain\Todo\GetTaskByIdInterface;
use App\Layers\Persistence\Model\Todo\TaskModel;
use App\Layers\Persistence\Repository\Todo\TaskRepository;

class GetTaskByIdAction implements GetTaskByIdInterface
{
    private TaskModel $taskModel;
    private TaskRepository $taskRepository;

    public function __construct(TaskModel $taskModel, TaskRepository $taskRepository)
    {
        $this->taskModel = $taskModel;
        $this->taskRepository = $taskRepository;
    }

    public function get(int $id): TaskDomain
    {
        return $this->taskModel->toDomain(
            $this->taskRepository->getTaskById($id)
        );
    }
}
