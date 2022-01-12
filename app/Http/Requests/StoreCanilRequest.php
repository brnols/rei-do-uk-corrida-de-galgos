<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCanilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'galgo'      => 'required|string|max:255',
//            'pista'      => 'required|string|max:255',
//            'tabela'     => 'required|string|max:255',
            'observacao' => 'nullable|string',
        ];
    }
}
