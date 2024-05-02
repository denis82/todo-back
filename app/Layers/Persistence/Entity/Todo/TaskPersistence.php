<?php

namespace App\Layers\Persistence\Entity\Todo;

class TaskPersistence
{
    private ?int $_taskId;
    private ?bool $_taskFlag;
    private ?string $_taskTitle;
    private ?string $_taskCompletionDate;
    private ?string $_taskCompletionTime;

    public function __construct(
        ?int $taskId,
        ?bool $taskFlag,
        ?string $taskTitle,
        ?string $taskCompletionDate,
        ?string $taskCompletionTime
    ) {
        $this->_taskId   = $taskId;
        $this->_taskFlag = $taskFlag;
        $this->_taskTitle = $taskTitle;
        $this->_taskCompletionDate = $taskCompletionDate;
        $this->_taskCompletionTime = $taskCompletionTime;
    }

    public function getId(): ?int
    {
        return $this->_taskId;
    }

    public function getTitle(): ?string
    {
        return $this->_taskTitle;
    }

    public function getFlag(): ?bool
    {
        return $this->_taskFlag;
    }
    public function getCompletionDate(): ?string
    {
        return $this->_taskCompletionDate;
    }

    public function getCompletionTime(): ?string
    {
        return $this->_taskCompletionTime;
    }
}
