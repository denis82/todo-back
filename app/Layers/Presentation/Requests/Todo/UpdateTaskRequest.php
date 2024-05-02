<?php

namespace App\Layers\Presentation\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use App\Layers\Presentation\View\Todo\TaskView;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
	{
		return true;
	}
    public function rules(): array
    {
        return [
            TaskView::TASK_TITLE           => 'nullable|string',
            TaskView::TASK_FLAG            => 'required|boolean',
            TaskView::TASK_COMPLETION_DATE => 'nullable|string',
            TaskView::TASK_COMPLETION_TIME => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            TaskView::TASK_FLAG            => (int)$this->{TaskView::TASK_FLAG},
            TaskView::TASK_TITLE           => $this->{TaskView::TASK_TITLE} ?? null,
            TaskView::TASK_COMPLETION_DATE => $this->{TaskView::TASK_COMPLETION_DATE} ?? null,
            TaskView::TASK_COMPLETION_TIME => $this->{TaskView::TASK_COMPLETION_TIME} ?? null,
        ]);
    }
}
