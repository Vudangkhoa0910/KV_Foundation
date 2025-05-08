<?php

namespace App\Http\Requests;

use App\Models\PostCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('post'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_title' => 'required|string|max:200',
            'post_excerpt' => 'nullable|string|max:50',
            'post_body' => 'required|string',
            'category_id' => ['required', Rule::in(PostCategory::pluck('post_category_id'))]
        ];
    }
}
