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
            'city'              => 'required',

                    // BANK
            'name_bank'         => 'string',
            'number_bank'       => 'numeric',

                    //AGENCY
            'number_agency'     => 'numeric',

            //         //ACCOUNT
            'balance'           => 'numeric|',
            'number_account'    => 'numeric|unique:accounts,number_account',

                       //SAQUE
            'retired'           => 'numeric',
            'accounts_id'       => 'numeric',

                        //TICKET
            // 'number_ticket'     =>'numeric',
            // 'value_ticket'      =>'numeric',
            // 'date_ticket'       =>'date'


            //         //EXTRACT
            // 'every_payments'    => 'numeric',
            // 'every_transfer'    => 'numeric',

            //         //PAYMENT
            // 'value_payment'     => 'numeric',
            // 'account_payment'   => 'numeric',

            //         //TRANSFER
            // 'value_transfer'    => 'numeric',
            // 'account_transfer'  => 'numeric',
            // 'account_Fromtransfer'  =>'numeric'
        ];
    }
}
