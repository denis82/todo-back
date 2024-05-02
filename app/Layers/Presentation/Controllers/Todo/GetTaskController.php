<?php

namespace App\Layers\Presentation\Controllers\Todo;

use App\Layers\UseCase\Todo\GetTaskByIdUseCase;
use App\Layers\Presentation\View\Todo\TaskView;
use App\Layers\Presentation\Controllers\Controller;

class GetTaskController extends Controller
{
    private TaskView $_taskView;
    private GetTaskByIdUseCase $_getTaskByIdUseCase;

    public function __construct(
        TaskView $taskView,
        GetTaskByIdUseCase $getTaskByIdUseCase)
    {
         $this->_taskView = $taskView;
         $this->_getTaskByIdUseCase = $getTaskByIdUseCase;
    }

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        $tasks = $this->_taskView->toInstance(
            $this->_getTaskByIdUseCase->get($id)
        );
        return response()->json($tasks);
    }

}
