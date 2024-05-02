<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;

interface UpdateTaskInterface
{
    public function save(TaskDomain $task, int $id): TaskDomain;
}
