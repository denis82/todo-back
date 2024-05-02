<?php

namespace App\Layers\Presentation\Controllers\Todo;

use App\Layers\Domain\Todo\Dto\UpdateTaskDto;
use App\Layers\UseCase\Todo\UpdateTaskUseCase;
use App\Layers\Presentation\View\Todo\TaskView;
use App\Layers\Presentation\Controllers\Controller;
use App\Layers\Presentation\Requests\Todo\UpdateTaskRequest;

class UpdateTaskController extends Controller
{
    private TaskView $_taskView;
    private UpdateTaskUseCase $_updateTaskUseCase;

    public function __construct(
        TaskView $taskView,
        UpdateTaskUseCase $updateTaskUseCase)
    {
         $this->_taskView = $taskView;
         $this->_updateTaskUseCase = $updateTaskUseCase;
    }

    public function update(UpdateTaskRequest $updateTaskRequest, int $id): \Illuminate\Http\JsonResponse
    {
        $validated = $updateTaskRequest->validated();
        $createTaskDto = new UpdateTaskDto (
            $id,
            $validated[TaskView::TASK_TITLE],
            $validated[TaskView::TASK_FLAG],
            $validated[TaskView::TASK_COMPLETION_DATE],
            $validated[TaskView::TASK_COMPLETION_TIME]
        );
        $task = $this->_taskView->toInstance(
            $this->_updateTaskUseCase->update($createTaskDto,$id)
        );
        return response()->json($task);
    }

}
