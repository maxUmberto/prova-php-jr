<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/|max:100',
            'cpf' => 'required|numeric|digits:11',
            'day' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'phone' => 'required|numeric|digits_between:10,11',
            'address' => 'required|string|max:150',
            'address_number' => 'required|numeric',
            'address_uf' => 'required|string|size:2',
            'address_city' => 'required|string|max:60',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O nome é obrigatório',
            'name.regex' => 'Somente letras e acentos no nome',
            'name.max' => 'Nome pode ter no máximo 100 caracteres',

            'cpf.required' => 'O CPF é obrigatório',
            'cpf.numeric' => 'Digite somente números no CPF',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos',

            'day.required' => 'O campo dia é obrigatório',
            'day.numeric' => 'Dia não selecionado',

            'month.required' => 'O campo mês é obrigatório',
            'month.numeric' => 'Mês não selecionado',

            'year.required' => 'O campo ano é obrigatório',
            'year.numeric' => 'Ano não selecionado',

            'birthday_date' => 'A data inserida não é válida',

            'phone.required' => 'O telefone é obrigatório',
            'phone.numeric' => 'Digite somente números no telefone',
            'phone.digits_between' => 'Telefone com quantidade de caracteres inválidos',

            'address.required' => 'O endereço é obrigatório',
            'address.max' => 'Endereço pode ter no máximo 100 caracteres',

            'address_number.required' => 'O número é obrigatório',
            'address_number.numeric' => 'Digite somente números no número',

            'address_uf.required' => 'O estado é obrigatória',
            'address_uf.size' => 'Houve um problema com o estado, tente novamente',

            'address_city.required' => 'A cidade é obrigatório',
            'address_city.max' => 'Cidade pode ter no máximo 100 caracteres',
        ];
    }
}
