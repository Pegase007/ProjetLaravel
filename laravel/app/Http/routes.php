<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' =>'PagesController@home','as'=>'home']);
/**
 * Permet de connecter l'URI contact à la page Contact
 */
Route::get('/contact',['uses' => 'PagesController@contact','as'=>'contact']);
/**
 * Permet de connecter l'URI mentionlegales à la page MentionLegales
 * Le /Pages permet de cibler le fichier Page dans lequel se trouvent les pages
 */

Route::get('/mentionlegales',['uses' => 'PagesController@mention', 'as' =>'mentions']);

/**
 * Permet de connecter l'URI faq à la page FAQ
 */
Route::get('/faq',['uses' =>'PagesController@faq', 'as'=>'faq' ]);


Route::get('/search',['uses' =>'PagesController@search', 'as'=>'search' ]);





/**
 * GROUPE DE ROUTES actors
 */

Route::group(['prefix' =>'actors', 'as'=>'actors'],function(){

    /**
     * Actors index liste les acteurs
     */
    Route::get('/index/{ville?}',['uses' =>'ActorsController@index','as'=>'.index']);
    /**
     * Actors index lit un seul acteur
     */
    Route::get('/read/{id}',['uses' =>'ActorsController@read','as'=>'.read'])
     ->where('id','[0-9]+');

    /**
     * Actors index crée des acteurs
     */
    Route::get('/create',['uses' =>'ActorsController@create','as'=>'.create']);
    /**
     * Actors index met à jours les acteurs
     */
    Route::get('/update/{id}',['uses' =>'ActorsController@update','as'=>'.update'])
        ->where('id','[0-9]+');
    /**
     * Actors index supprime des acteurs
     */
    Route::get('/delete/{id}',['uses' =>'ActorsController@delete','as'=>'.delete'])
        ->where('id','[0-9]+');




});



/**
 * GROUPE DE ROUTES directors
 */



Route::group(['prefix' =>'directors', 'as'=>'directors' ],function() {
    /**
     * Actors index liste les acteurs
     */
    Route::get('/index/{ville?}', ['uses' => 'DirectorsController@index', 'as'=> '.index']);

    /**
     * Actors index lit un seul acteur
     */
    Route::get('/read/{id}', ['uses' => 'DirectorsController@read','as'=> '.read'])
    ->where('id','[0-9]+');
    /**
     * Actors index crée des acteurs
     */
    Route::get('/create', ['uses' => 'DirectorsController@create','as'=> '.create']);
    /**
     * Actors index met à jours les acteurs
     */
    Route::get('/update/{id}', ['uses' => 'DirectorsController@update','as'=> '.update'])
        ->where('id','[0-9]+');
    /**
     * Actors index supprime des acteurs
     */
    Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete','as'=> '.delete'])
        ->where('id','[0-9]+');

});




/**
 * GROUPE DE ROUTES movies
 */



Route::group(['prefix' =>'movies', 'as' =>'movies'],function() {
    /**
     * Movies index liste les movies
     * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
     */
    Route::get('/form', ['uses' => 'MoviesController@form', 'as'=>'.form']);

    Route::get('/index', ['uses' => 'MoviesController@index', 'as'=>'.index']);

    /**
     * Movies index lit un seul movies
     */
    Route::get('/read/{id}', ['uses' => 'MoviesController@read', 'as'=>'.read']);



    /**
     * Movies index crée des movies
     */
    Route::get('/create', ['uses' => 'MoviesController@create', 'as'=>'.create']);
    /**
     * Movies index met à jours les movies
     */
    Route::get('/update/{id}/{action}', ['uses' => 'MoviesController@update' , 'as'=>'.update'])
        ->where('id','[0-9]+');

    /**
     * Movies condition permet de trier la table
     */
    Route::get('/condition/{condition}', ['uses' => 'MoviesController@condition' , 'as'=>'.condition']);


    Route::any('/actions/{input}', ['uses' => 'MoviesController@actions' , 'as'=>'.actions']);





//    /**
//     * Movies index met à jours les movies
//     */
//    Route::get('/updatecover/{id}', ['uses' => 'MoviesController@updatecover', 'as'=>'.updatecover'])
//        ->where('id','[0-9]+');


    /**
     * Movies index supprime des movies
     */
    Route::get('/delete/{id}', ['uses' => 'MoviesController@delete', 'as'=>'.delete'])
        ->where('id','[0-9]+');

    /**
     * Movies search recherche des films avec des attributs par default
     */
    Route::get('/search/{languages?}/{visible?}/{duree?}', ['uses' => 'MoviesController@search', 'as' => '.search'])
        ->where (['languages'=> '^(en|es|fr)$' , 'visible'=>'0|1','duree'=>'[1-9]+']);




});


/**
 * GROUPE DE ROUTES users
 */



Route::group(['prefix' =>'users','as'=>'users'],function() {
    /**
     * Movies index liste les movies
     * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
     */
    Route::get('/index', ['uses' => 'UsersController@index', 'as'=>'.index']);
    /**
     * Movies index lit un seul movies
     */
    Route::get('/read/{id}', ['uses' => 'UsersController@read', 'as'=>'.read']);
    /**
     * Movies index crée des movies
     */
    Route::get('/create', ['uses' => 'UsersController@create', 'as'=>'.create']);
    /**
     * Movies index met à jours les movies
     */
    Route::get('/update/{id}', ['uses' => 'UsersController@update', 'as'=>'.update'])
        ->where('id','[0-9]+');
    /**
     * Movies index supprime des movies
     */
    Route::get('/delete/{id}', ['uses' => 'UsersController@delete', 'as'=>'.delete'])
        ->where('id','[0-9]+');

    /**
     * Movies search recherche des films avec des attributs par default
     */
    Route::get('/search/{zipcode?}/{ville?}/{enabled?}', ['uses' => 'UsersController@search', 'as' => '.search'])
        ->where (['zipcode'=> '[0-9]{5}|[0-9]{2}|[*]' , 'ville'=>'[a-zA-Z-]+|[*]','enabled'=>'0|1|[*]']);




});


Route::group(['prefix' =>'cinema', 'as'=>'cinema'],function() {
    /**
     * Cinema index liste les movies
     * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
     */
    Route::get('/index', ['uses' => 'CinemaController@index', 'as'=>'.index']);
    /**
     * Cinema index lit un seul movies
     */
    Route::get('/read/{id}', ['uses' => 'CinemaController@read', 'as'=>'.read']);
    /**
     * Cinema index crée des movies
     */
    Route::get('/create', ['uses' => 'CinemaController@create', 'as'=>'.create']);
    /**
     * Cinema index met à jours les movies
     */
    Route::get('/update/{id}', ['uses' => 'CinemaController@update', 'as'=>'.update'])
        ->where('id','[0-9]+');
    /**
     * Cinema index supprime des movies
     */
    Route::get('/delete/{id}', ['uses' => 'CinemaController@delete', 'as'=>'.delete'])
        ->where('id','[0-9]+');

    /**
     * Cinema search recherche des films avec des attributs par default
     */
    Route::get('/search', ['uses' => 'CinemaController@cinema', 'as' => '.search']);




});

Route::group(['prefix' =>'category', 'as'=>'category'],function() {
    /**
     * Category index liste les movies
     * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
     */
    Route::get('/index', ['uses' => 'CategoryController@index', 'as'=>'.index']);
    /**
     * Category index lit un seul movies
     */
    Route::get('/read/{id}', ['uses' => 'CategoryController@read', 'as'=>'.read']);
    /**
     * Category index crée des movies
     */
    Route::get('/create', ['uses' => 'CategoryController@create', 'as'=>'.create']);
    /**
     * Category index met à jours les movies
     */
    Route::get('/update/{id}', ['uses' => 'CategoryController@update', 'as'=>'.update'])
        ->where('id','[0-9]+');
    /**
     * Category index supprime des movies
     */
    Route::get('/delete/{id}', ['uses' => 'CategoryController@delete', 'as'=>'.delete'])
        ->where('id','[0-9]+');

    /**
     * Category search recherche des films avec des attributs par default
     */
    Route::get('/search', ['uses' => 'CategoryController@cinema', 'as' => '.search']);




});



//Route::controller('cinema','CinemaController');
//
//Route::controller('category','CategoryController');









/**
 * Un systeme de routing peux renvoyer une view ou un text
 */

Route::get('/toto',function(){

    return "<h3>TOTO</h3>";

});

