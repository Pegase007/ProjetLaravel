<?php

namespace App\Http\Requests;




use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActorsRequest
 * @package App\Http\Requests
 */
class MoviesRequest extends FormRequest{


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

            'type_film' =>'required',
            'title' =>'required|min:3',
            'trailer' =>'required|url',
            'categories_id' =>'required',
            'directors_id' =>'required',
            'actors_id' =>'required',
            'languages' =>'required',
            'bo' =>'required',
            'distributeur' =>'required',
            'date_release' =>'required',
//            'note'=>'required|numeric|max:10',
            'visible'=>'required',
            'cover'=>'required',
            'synopsis' =>'required|min:10|max:500',
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