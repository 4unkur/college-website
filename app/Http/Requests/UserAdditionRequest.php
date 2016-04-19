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
            'first_name' => 'required|max:255|min:2',
            'last_name' => 'required|max:255|min:2',
            'email' => $this->isMethod('post') ? 'required|email|max:255|unique:users' : 'required|email|max:255',
            'type' => 'required',
            'status' => 'required',
            'password' => $this->isMethod('post') ? 'required|confirmed|min:4' : '',
            'avatar' => 'image',
        ];
    }
}
