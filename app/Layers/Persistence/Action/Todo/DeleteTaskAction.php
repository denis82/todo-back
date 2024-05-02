<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\DeleteTasksInterface;
use App\Layers\Persistence\Model\Todo\TaskModel;
use App\Layers\Persistence\Repository\Todo\TaskRepository;

class DeleteTaskAction implements DeleteTasksInterface
{
    private TaskModel $taskModel;
    private TaskRepository $taskRepository;

    public function __construct(TaskModel $taskModel, TaskRepository $taskRepository)
    {
        $this->taskModel = $taskModel;
        $this->taskRepository = $taskRepository;
    }

    public function delete(int $id): void
    {
        $this->taskRepository->deleteTask($id);
    }
}
