<?php

namespace App\Layers\Domain\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;

interface GetTaskByIdInterface
{
    public function get(int $id): TaskDomain;
}
