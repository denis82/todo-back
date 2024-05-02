<?php

namespace App\Layers\Persistence\Repository\Todo;

use App\Layers\Persistence\Entity\Todo\TaskPersistence;

class TaskRepository
{
    public function insert(TaskPersistence $taskPersistence): void
    {
        $taskEloquentModel = new Task([
            'title'           => $taskPersistence->getTitle(),
            'completion_date' => $taskPersistence->getCompletionDate(),
            'completion_time' => $taskPersistence->getCompletionTime()
        ]);
        $taskEloquentModel->save();
    }

    public function updateTask(TaskPersistence $taskPersistence, int $id): TaskPersistence
    {
        $taskEloquentModel = Task::find($id);
        $taskEloquentModel->update([
            'title'           => $taskPersistence->getTitle(),
            'flag'            => $taskPersistence->getFlag(),
            'completion_date' => $taskPersistence->getCompletionDate(),
            'completion_time' => $taskPersistence->getCompletionTime()
        ]);
        return $this->makePersistenceEntity($taskEloquentModel);
    }
    public function deleteTask(int $id): void
    {
        Task::destroy($id);
    }

    public function getTaskById(int $id): TaskPersistence
    {
        $taskEloquentModel = Task::find($id);
        return $this->makePersistenceEntity($taskEloquentModel);
    }

    public function getTasks(): array
    {
        $taskAllEloquentModel = Task::all();
        return  $taskAllEloquentModel->map(
            fn (Task $taskEloquentModel): TaskPersistence => $this->makePersistenceEntity($taskEloquentModel)
        )->toArray();
    }

    private function makePersistenceEntity(Task $taskEloquentModel): TaskPersistence
    {
        return new TaskPersistence(
            $taskEloquentModel->id,
            $taskEloquentModel->flag,
            $taskEloquentModel->title,
            $taskEloquentModel->completion_date,
            $taskEloquentModel->completion_time
        );
    }

}
