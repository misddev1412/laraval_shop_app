<?php

namespace App\Http\Requests\Post;


use App\Http\Requests\BaseRequest;

class CreatePostRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'translations' => 'array',
            'translations.*.title' => 'required|string',
            'translations.*.content' => 'required|string',
            'translations.*.locale' => 'required|string',
        ];
    }
}
