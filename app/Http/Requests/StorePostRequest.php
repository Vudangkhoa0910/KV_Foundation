<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\PostCategory;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Post::class);
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
