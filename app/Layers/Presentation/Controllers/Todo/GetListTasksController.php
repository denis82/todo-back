<?php

namespace App\Layers\Presentation\Controllers\Todo;

use Illuminate\Http\Request;
use App\Layers\UseCase\Todo\GetAllTasksUseCase;
use App\Layers\Presentation\View\Todo\TaskView;
use App\Layers\Presentation\Controllers\Controller;

class GetListTasksController extends Controller
{
    private TaskView $_taskView;
    private GetAllTasksUseCase $_getAllTasksUseCase;

    public function __construct(
        TaskView $taskView,
        GetAllTasksUseCase $getAllTasksUseCase)
    {

        $this->_taskView = $taskView;
        $this->_getAllTasksUseCase = $getAllTasksUseCase;
    }

    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $tasks = $this->_taskView->toArray(
             $this->_getAllTasksUseCase->getAll()
        );
        return response()->json($tasks);
    }

}
