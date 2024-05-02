<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;

interface DeleteTasksInterface
{
    public function delete(int $id): void;
}
