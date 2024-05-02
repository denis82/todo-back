<?php

namespace App\Layers\Domain\Todo\Dto;

class UpdateTaskDto
{
    private ?int $_id;
    private ?string $_title;
    private ?bool $_flag;
    private ?string $_completionDate;
    private ?string $_completionTime;

    public function __construct(
        ?int $id,
        ?string $title,
        ?bool $flag,
        ?string $completionDate,
        ?string $completionTime,
        )
    {
        $this->_id             = $id;
        $this->_flag           = $flag;
        $this->_title          = $title;
        $this->_completionDate = $completionDate;
        $this->_completionTime = $completionTime;
    }

    public function getId(): string
    {
        return $this->_id;
    }
    public function getTaskTitle(): string
    {
        return $this->_title;
    }
    public function getTaskFlag(): int
    {
        return $this->_flag;
    }
    public function completionDate(): ?string
    {
        return $this->_completionDate;
    }
    public function completionTime(): ?string
    {
        return $this->_completionTime;
    }
}
