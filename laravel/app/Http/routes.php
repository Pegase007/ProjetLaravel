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

Route::get('/', function () {

    return view('welcome');
});
/**
 * Permet de connecter l'URI contact à la page Contact
 */
Route::get('/contact',['uses' => 'PagesController@contact']);
/**
 * Permet de connecter l'URI mentionlegales à la page MentionLegales
 * Le /Pages permet de cibler le fichier Page dans lequel se trouvent les pages
 */

Route::get('/mentionlegales',['uses' => 'PagesController@mention']);

/**
 * Permet de connecter l'URI faq à la page FAQ
 */
Route::get('/faq',['uses' =>'PagesController@faq']);





/**
 * GROUPE DE ROUTES actors
 */

Route::group(['prefix' =>'actors'],function(){

    /**
     * Actors index liste les acteurs
     */
    Route::get('/index',['uses' =>'ActorsController@index']);
    /**
     * Actors index lit un seul acteur
     */
    Route::get('/read/{id}',['uses' =>'ActorsController@read']);
    /**
     * Actors index crée des acteurs
     */
    Route::get('/create',['uses' =>'ActorsController@create']);
    /**
     * Actors index met à jours les acteurs
     */
    Route::get('/update/{id}',['uses' =>'ActorsController@update']);
    /**
     * Actors index supprime des acteurs
     */
    Route::get('/delete/{id}',['uses' =>'ActorsController@delete']);





});



/**
 * GROUPE DE ROUTES directors
 */



Route::group(['prefix' =>'directors'],function() {
    /**
     * Actors index liste les acteurs
     */
    Route::get('/index/{id}', ['uses' => 'DirectorsController@index']);
    /**
     * Actors index lit un seul acteur
     */
    Route::get('/read/{id}', ['uses' => 'DirectorsController@read']);
    /**
     * Actors index crée des acteurs
     */
    Route::get('/create', ['uses' => 'DirectorsController@create']);
    /**
     * Actors index met à jours les acteurs
     */
    Route::get('/update/{id}', ['uses' => 'DirectorsController@update']);
    /**
     * Actors index supprime des acteurs
     */
    Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete']);

});



/**
 * Permet de connecter l'URI actors à la page Actors
 */
Route::get('/directors',['uses' =>'PagesController@directors']);








/**
 * Un systeme de routing peux renvoyer une view ou un text
 */

Route::get('/toto',function(){

    return "<h3>TOTO</h3>";

});

