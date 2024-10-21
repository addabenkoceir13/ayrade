<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'phone'     => 'required|numeric',
            'email'     => 'required|email',
            'status' => 'in:active,inactive',
        ];
    }

    public function attributes()
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'phone' => 'Phone',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
        ];
    }
}
