<?php

namespace App\Layers\Domain\Todo\Entity;

class TaskDomain
{
    private ?int $_taskId;
    private string $_taskTitle;
    private ?int $_taskFlag;
    private ?string $_taskCompletionDate;
    private ?string $_taskCompletionTime;

    public function __construct(
        ?int $taskId,
        ?int $taskFlag,
        string $taskTitle,
        ?string $taskCompletionDate,
        ?string $taskCompletionTime
    ) {
        $this->_taskTitle          = $taskTitle;
        $this->_taskFlag           = $taskFlag;
        $this->_taskId             = $taskId;
        $this->_taskCompletionDate = $taskCompletionDate;
        $this->_taskCompletionTime = $taskCompletionTime;
    }

    public function getTaskId(): ?int
    {
        return $this->_taskId;
    }

    public function getTaskTitle(): string
    {
        return $this->_taskTitle;
    }

    public function getTaskFlag(): ?int
    {
        return $this->_taskFlag;
    }
    public function getTaskCompletionDate(): ?string
    {
        return $this->_taskCompletionDate;
    }
    public function getTaskCompletionTime(): ?string
    {
        return $this->_taskCompletionTime;
    }
}
