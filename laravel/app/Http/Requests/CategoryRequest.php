<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActorsRequest
 * @package App\Http\Requests
 */
class CategoryRequest extends FormRequest{


    /**
     *   * Determine if the user is authorized to make this request
     * @return bool
     */
    public function authorize(){
        return true;
    }


    /**
     * Get the validation rules that apply to the request
     * Retourne un tableau de validateur par champs
     * @return array
     */
    public function rules(){


        return[

            'title' =>'required|min:3',
            'description' =>'required|min:10|max:500',
            'image' =>'required|image',

        ];

    }

    /**
     * @return array
     * Aliasser les noms des messages d'erreur
     */

    public function messages(){

        return[

            'required' => 'Le champ :attribute est obligatoire',
        ];
    }





}


?>