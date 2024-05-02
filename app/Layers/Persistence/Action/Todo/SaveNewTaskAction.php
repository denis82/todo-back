<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Domain\Todo\SaveNewTaskInterface;
use App\Layers\Persistence\Model\Todo\TaskModel;
use App\Layers\Persistence\Repository\Todo\TaskRepository;

class SaveNewTaskAction implements SaveNewTaskInterface
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

    public function save(TaskDomain $task): void
    {
        $this->taskRepository->insert(
            $this->taskModel->fromDomain($task)
        );
    }
}
