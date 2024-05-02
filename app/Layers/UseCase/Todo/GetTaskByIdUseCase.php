<?php

namespace App\Layers\UseCase\Todo;

use App\Layers\Domain\Todo\Entity\TaskDomain;
use App\Layers\Domain\Todo\GetTaskByIdInterface;

class GetTaskByIdUseCase
{
    private GetTaskByIdInterface $getTaskById;

    public function __construct(GetTaskByIdInterface $getTaskById)
    {
        $this->getTaskById = $getTaskById;
    }

    public function get(int $id): TaskDomain
    {
        return $this->getTaskById->get($id);
    }
}
