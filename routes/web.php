<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * site landing page
 */
Route::get('/', function () {
    return view('home');
});

/**
 * dynamic sitemap
 */
Route::get('/sitemap.xml', function(){
    return view('sitemap');
}
);

//quest_routes
Route::resource('quests','QuestController');

Route::get('quests/search/{reward_type}', 'QuestController@search_quest');
Route::get('/quests/stop/{pokestop_id}/edit','QuestController@edit_stop_details');
Route::get('/quests/stop/{pokestop_id}/create','QuestController@create_quest');
Route::get('/quest_feed','QuestController@show_feed');

//raids_routes
Route::resource('raids','RaidController');
Route::resource('gyms','GymController');

//pokestop_routes
Route::get('/pokestops','PokeStopController@index');
Route::put('/pokestopdetails/{pokestop_id}','QuestController@update_stop_details');
Route::patch('/pokestopdetails/{pokestop_id}','QuestController@update_stop_details');



