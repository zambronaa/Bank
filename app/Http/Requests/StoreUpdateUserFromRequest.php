<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFromRequest extends FormRequest
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
                    //USERS
            'name'              => 'required|string',
            'document_type'     => 'required',
            'document_number'   => 'required|numeric',

            'email'             => [
                                    'required',
                                    'email',
                                    ],
            'password'          =>  [
                                    'required',
                                    'min:6',
                                    'max:15',
                                    ],
                    //ADDRESSES
            'cep'               => 'required|numeric',
            'addreses'          => 'required',
            'number'            => 'required|numeric',
            'district'          => 'required',
            'complement'        => 'string|nullable',
            'state'             => 'required|',
            'city'              => 'required'
        ];
    }
}
