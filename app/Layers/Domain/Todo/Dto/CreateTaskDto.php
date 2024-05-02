<?php

namespace App\Layers\Domain\Todo\Dto;

class CreateTaskDto
{
    private string $_title;
    private string $_completionDate;
    private string $_completionTime;

    public function __construct(
        string $title,
        string $completionDate,
        string $completionTime,
        )
    {
        $this->_title = $title;
        $this->_completionDate = $completionDate;
        $this->_completionTime = $completionTime;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }
    public function completionDate(): string
    {
        return $this->_completionDate;
    }
    public function completionTime(): string
    {
        return $this->_completionTime;
    }
}
