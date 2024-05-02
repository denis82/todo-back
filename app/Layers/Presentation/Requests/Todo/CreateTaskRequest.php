<?php

namespace App\Layers\Presentation\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use App\Layers\Presentation\View\Todo\TaskView;

class CreateTaskRequest extends FormRequest
{
    public function authorize()
	{
		return true;
	}
    public function rules(): array
    {
        return [
            TaskView::TASK_TITLE           => 'required|string',
            TaskView::TASK_COMPLETION_DATE => 'nullable|string',
            TaskView::TASK_COMPLETION_TIME => 'nullable|string',
        ];
    }
}
