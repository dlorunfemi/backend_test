<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            // 'name'                => 'required|string|min:2|max:255',
            // "isbn"                => "required|string",
            // "authors"             => "required|string",
            // "country"             => "required|string",
            // "publisher"           => "required|string",
            // "release_date"        => "required|string",
            // "number_of_pages"     => "required|ingeter",
        ];
    }
}
