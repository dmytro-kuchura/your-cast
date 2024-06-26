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
    public function rules(): array
    {
        return [
            'title' => 'string|min:2|required',
            'link' => 'string|required',
            'season' => 'required',
            'episode' => 'required',
            'alias' => 'string|required',
            'summary' => 'string|required',
        ];
    }

    public function messages(): array
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
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json(
            $validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
