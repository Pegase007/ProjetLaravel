<?php

namespace App\Http\Requests;




use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActorsRequest
 * @package App\Http\Requests
 */
class DirectorsRequest extends FormRequest{


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

            'firstname' =>'required|min:3',
            'lastname' =>'required|min:3',
            'dob' =>'required',
            'note'=>'required|numeric|max:10',
            'biography' =>'required|min:10|max:500',
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


    /**
     * Permet d'aliaser les attributs dans les messages
     * @return array
     */
    public function attributes()
    {
        return[
            'firstname' => 'prénom', //This will replace any instance of 'username' in validation messages with 'email'
            'lastname' => 'Nom', //This will replace any instance of 'username' in validation messages with 'email'
            //'anyinput' => 'Nice Name',
        ];

    }


}


?>