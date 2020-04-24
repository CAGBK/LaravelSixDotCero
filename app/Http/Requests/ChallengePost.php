<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengePost extends FormRequest
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
            'check_user' => 'required|present|array',
            'check_subcategory' => 'required|present|array',
            'name' => 'required|max:255',
            'number_questions' => 'required',
            'end_date' => 'required|date|after_or_equal:now',
            'state_id' => 'required',   
        ];
    }
    public function messages()
    {
        return [
            'check_user.required' => 'Los Usuarios son requeridos para crear el Desafío',
            'check_subcategory.required' => 'Los Marcas son requeridas para crear el Desafío',
            'name.required' => 'Nombre de Desafío requerido',
            'number_questions.required' => 'Cantitdad de preguntas requerido',
            'end_date.required' => 'Fecha invalida',
            'state_id.required' => 'Estado del Desafío requerido',  
        ];
    }
}
