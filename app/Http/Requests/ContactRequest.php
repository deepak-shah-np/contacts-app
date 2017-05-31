<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
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

        $user = Auth::user();
       /* return [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,'.$user->id,
            'phone' =>'required|unique:contacts,phone,'.$user->id,
            'address' => 'required',
            'company'=>'required',
            'birth_date'=>'required'
        ];*/



        return [
            'name' => 'required',
            'email' => 'required|email|uniqueattr:'.$this->segment(2),
            'phone' => 'required|uniqueattr:'.$this->segment(2),
            'address' => 'required',
            'company'=>'required',
            'birth_date'=>'required'
        ];

    }
}
