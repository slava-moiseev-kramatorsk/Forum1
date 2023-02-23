<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
//
            'title' => ['string', 'min:5', 'max:30'],
            'author' => ['string', 'min:5', 'max:30'],
            'page' => ['integer'],
            'genre' => ['string', 'max:30','min:3'],
            'price' => ['integer'],
            'description' => ['min:5', 'max:255'],
        ];
    }
}
