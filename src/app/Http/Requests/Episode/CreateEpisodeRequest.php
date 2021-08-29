<?php

namespace App\Http\Requests\Episode;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CreateEpisodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|min:2|required',
            'subtitle' => 'string|required',
            'link' => 'string|required',
            'season' => 'string|required',
            'episode' => 'string|required',
            'alias' => 'string|required',
            'summary' => 'string|required',
        ];
    }

    public function messages()
    {
        return [
            'title' => 'Invalid title',
            'subtitle' => 'Invalid subtitle',
            'link' => 'Invalid link',
            'season' => 'Invalid season',
            'episode' => 'Invalid episode',
            'alias' => 'Invalid alias',
            'summary' => 'Invalid summary',
        ];
    }

    /**
     * Format errors
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
