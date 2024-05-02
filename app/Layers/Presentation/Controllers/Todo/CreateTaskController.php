<?php

namespace App\Layers\Presentation\Controllers\Todo;

use App\Layers\Domain\Todo\Dto\CreateTaskDto;
use App\Layers\UseCase\Todo\GetTaskByIdUseCase;
use App\Layers\Presentation\View\Todo\TaskView;
use App\Layers\UseCase\Todo\CreateNewTaskUseCase;
use App\Layers\Presentation\Controllers\Controller;
use App\Layers\Presentation\Requests\Todo\CreateTaskRequest;

class CreateTaskController extends Controller
{
    private TaskView $_taskView;
    private CreateNewTaskUseCase $_createNewTaskUseCase;

    public function __construct(
        TaskView $taskView,
        CreateNewTaskUseCase $createNewTaskUseCase)
    {
         $this->_taskView = $taskView;
         $this->_createNewTaskUseCase = $createNewTaskUseCase;
    }

    public function create(CreateTaskRequest $createTaskRequest): \Illuminate\Http\JsonResponse
    {
        $validated = $createTaskRequest->validated();

        $createTaskDto = new CreateTaskDto (
            $validated[TaskView::TASK_TITLE],
            $validated[TaskView::TASK_COMPLETION_DATE],
            $validated[TaskView::TASK_COMPLETION_TIME]
        );

        $this->_createNewTaskUseCase->create($createTaskDto);

        return response()->json([
            'data' => 'ok'
        ]);
    }

}
