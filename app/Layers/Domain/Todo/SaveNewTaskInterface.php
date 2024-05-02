<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;

interface SaveNewTaskInterface
{
    public function save(TaskDomain $task): void;
}
