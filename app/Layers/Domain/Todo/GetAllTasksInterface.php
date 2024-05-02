<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;

interface GetAllTasksInterface
{
    public function getAll(): array;
}
