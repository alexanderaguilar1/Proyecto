<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'tipo_persona'=>'required|varchar(20)',
            'nombre'=>'required|varchar(100)',
            'tipo_documento'=>'varchar(20)',
            'num_documento'=>'varchar(15)',
            'direccion'=>'varchar(70)',
            'telefono'=>'varchar(15)',
            'email'=>'varchar(50)',
        ];
    }
}
