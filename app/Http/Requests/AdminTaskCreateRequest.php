<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTaskCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'       => 'required|exists:users,id',
            'titre'         => 'required|string|max:255|unique:tasks,titre',
            'date_start'    => 'required|date',
            'date_end'      => 'required|date',
            'description'   => 'required',
            'statut'        => 'in:waiting,processing,completed',
        ];
    }
}
