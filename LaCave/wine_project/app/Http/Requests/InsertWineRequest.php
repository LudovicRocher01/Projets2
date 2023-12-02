<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertWineRequest extends FormRequest
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
            'Nom' =>['required','string','max:100'],
            'Description' =>['required','string','max:300'],
            'Degre_alcool'=> ['required','numeric','min:0'],
            'type_id' => ['required','numeric','min:0'],
            'producteur_id'=>['required','numeric','min:0'],
            'Prix_vin'=> ['required','numeric','min:0']
            //
        ];
    }
}
