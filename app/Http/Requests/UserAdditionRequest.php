<?php

namespace College\Http\Requests;

class UserAdditionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255|min:3',
            'last_name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users',
            'type' => 'required',
            'status' => 'required',
            'password' => 'required|confirmed|min:4',
        ];
    }
}
