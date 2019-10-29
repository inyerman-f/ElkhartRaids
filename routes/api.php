<?php
use App\Http\Controllers\API\QuestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/bot/create','API\BotConvoController@create');

Route::post('mon-alias/add','API\MonAliasController@add');
Route::get('mon-name/{mon_alias}','API\MonAliasController@get');

Route::post('gym-alias/add','API\GymAliasController@add');

Route::get('gymdata', 'API\RaidController@show_gyms');
Route::post('gym-alias/{gym_alias}','API\RaidController@get_gymid');
Route::get('gym-alias-id/{gym_alias}','API\RaidController@get_gymid');
Route::get('gym-alias-name/{gym_alias}','API\RaidController@get_gym_name');

Route::get('gym-aliases','API\GymAliasController@show_all');



Route::post('raidboss/add','API\RaidBossController@add');
Route::get('bossTier/{mon_alias}','API\RaidBossController@getTier');
Route::post('raid/create','API\RaidController@store');


Route::post('stop-alias/add','API\StopAliasController@add');
Route::post('/quest/create', 'API\QuestController@store');
Route::get('/quests', 'API\QuestController@index');
Route::get('stopdata','API\QuestController@show_stops');





