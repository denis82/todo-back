<?php

namespace App\Layers\Persistence\Action\Todo;

use App\Layers\Domain\Todo\GetAllTasksInterface;
use App\Layers\Persistence\Model\Todo\TaskModel;
use App\Layers\Persistence\Entity\Todo\TaskPersistence;
use App\Layers\Persistence\Repository\Todo\TaskRepository;

class GetAllTasksAction implements GetAllTasksInterface
{
    private TaskModel $_taskModel;
    private taskRepository $_taskRepository;

    public function __construct(taskModel $taskModel,  TaskRepository $taskRepository)
    {
        $this->_taskModel = $taskModel;
        $this->_taskRepository = $taskRepository;
    }

    public function getAll(): array
    {
        return array_map(
            function (TaskPersistence $taskPersistence){
                return $this->_taskModel->toDomain($taskPersistence);
            },
            $this->_taskRepository->getTasks()
        );
    }
}
