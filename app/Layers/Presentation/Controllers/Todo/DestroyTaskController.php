<?php

namespace App\Layers\Presentation\Controllers\Todo;


use App\Layers\UseCase\Todo\DeleteTaskUseCase;
use App\Layers\Presentation\View\Todo\TaskView;
use App\Layers\Presentation\Controllers\Controller;

class DestroyTaskController extends Controller
{
    private TaskView $_taskView;
    private DeleteTaskUseCase $_deleteTaskUseCase;

    public function __construct(
        TaskView $taskView,
        DeleteTaskUseCase $deleteTaskUseCase)
    {
         $this->_taskView = $taskView;
         $this->_deleteTaskUseCase = $deleteTaskUseCase;
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $this->_deleteTaskUseCase->delete($id);

        return response()->json([
            'data' => 'ok'
        ]);
    }
}
