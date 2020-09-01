<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class VentaFormRequest extends Request
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
            'idcliente'=> 'required',
            'tipo_comprobante'=>'required|max:50',
            'serie_comprobante'=>'required|max:7',
            'num_comprobante'=>'required|max:10',
            'fecha_hora'=>'required|date_add',
            'saldo_actual'=>'required|is_numeric',
        ];
    }
}
