<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KarbantartasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('Operátor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'eszkozid' =>['required',Rule::exists('eszkoz','id')],
            'sulyossag' => ['required', Rule::in([1,2,3,4,5,6,7,8,9,10])],
            'idopont' => ['required'],
            'leiras' => ['required'],
        ];
    }
}
