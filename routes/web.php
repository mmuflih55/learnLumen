<?php
// use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(["prefix"=>"checklists"], function () use ($router){
    // checklist
    $router->get('/', 'ChecklistController@getChecklists'); //get single checklist
    $router->post('/', 'ChecklistController@createChecklist'); //create checklist
    $router->get('/{checklistId}', 'ChecklistController@getChecklist'); //get all checklists
    $router->patch('/{checklistId}', 'ChecklistController@updateChecklist'); //update checklist
    $router->delete('/{checklistId}', 'ChecklistController@deleteChecklist'); //delete checklist

    // templates
    // $router->get('/templates', 'TemplateController@getTemplates');
    // $router->post('/templates', 'TemplateController@createTemplate');

});


