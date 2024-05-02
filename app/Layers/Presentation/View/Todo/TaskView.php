<?php

namespace App\Layers\Presentation\View\Todo;

use Illuminate\Support\Arr;
use App\Layers\Domain\Todo\Entity\TaskDomain;

class TaskView
{
    public const TASK_ID    = 'id';
    public const TASK_FLAG  = 'flag';
    public const TASK_TITLE = 'title';
    public const TASK_COMPLETION_DATE = 'completionDate';
    public const TASK_COMPLETION_TIME = 'completionTime';



    public function __construct()
    {
    }

    public function toInstance(TaskDomain $task): array
    {
        return [
            self::TASK_ID => $task->getTaskId(),
            self::TASK_TITLE => $task->getTaskTitle(),
            self::TASK_FLAG  => $task->getTaskFlag(),
            self::TASK_COMPLETION_DATE => $task->getTaskCompletionDate(),
            self::TASK_COMPLETION_TIME => $task->getTaskCompletionTime()
        ];
    }
    public function toArray(array $tasks): array
    {
        return Arr::map($tasks, function (TaskDomain $value, string $key) {
            return $this->toInstance($value) ;
        });
    }


}
