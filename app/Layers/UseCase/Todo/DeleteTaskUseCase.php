<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\DeleteTasksInterface;
use App\Layers\Domain\Todo\TaskBuilder;

class DeleteTaskUseCase
{
    private TaskBuilder $_taskBuilder;
    private DeleteTasksInterface $_deleteTask;

    public function __construct(DeleteTasksInterface $deleteTask, TaskBuilder $taskBuilder)
    {
         $this->_deleteTask = $deleteTask;
         $this->_taskBuilder = $taskBuilder;
    }

    public function delete(int $id): void
    {
        $task = $this->_taskBuilder->delete($id);
        abort_if(!$task, 424, 'Задача не закрыта');

        $this->_deleteTask->delete($id);
    }
}
