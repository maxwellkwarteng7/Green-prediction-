<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('/redirect','HomeController@redirect');



// Admin controller functions
Route::get('/add_game','AdminController@add_game');
Route::post('/save_game','AdminController@save_game');
Route::get('/straight_win','AdminController@straight_win');

// searching straight wins
Route::get('/search_straight_wins','AdminController@search_straight_wins');

// changing the check of straight wins
Route::get('/match_won/{id}','AdminController@match_won');
Route::get('/match_lost/{id}','AdminController@match_lost');

Route::get('delete_match/{id}','AdminController@delete_match');

Route::get('/both_teams','AdminController@both_teams');
Route::get('/search_both_teams','AdminController@search_both_teams');
Route::get('/overs','AdminController@overs');
Route::get('/search_overs','AdminController@search_overs');
Route::get('/corners','AdminController@corners');
Route::get('/search_corners','AdminController@search_corners');
Route::get('/weekend_prediction','AdminController@weekend_prediction');
Route::get('/search_predictions','AdminController@search_predictions');

// adding scorer
Route::get('/add_scorer','AdminController@add_scorer');
Route::post('/save_scorer_game','AdminController@save_scorer');

Route::get('/scorers','AdminController@scorers');
Route::get('/search_scorer','AdminController@search_scorer');

// deleting all straight wins and all the other games buttons
Route::get('/scorer_won/{id}','AdminController@scorer_won');
Route::get('/scorer_lost/{id}','AdminController@scorer_lost');

// displaying all the games with where you can edit
Route::get('/all_games','AdminController@all_games');
Route::get('/game_edit/{id}','AdminController@game_edit');
Route::get('/search_game','AdminController@search_game');
Route::post('/update_game/{id}','AdminController@update_game');

// editing scorer games
Route::get('edit_scorer/{id}','AdminController@edit_scorer');
Route::post('/update_scorer/{id}','AdminController@update_scorer');

// viewing all games from home
Route::get('/view_all_straight','HomeController@view_all_straight');
Route::get('/view_all_both','HomeController@view_all_both');
Route::get('/view_all_overs','HomeController@view_all_overs');
Route::get('/view_all_corners','HomeController@view_all_corners');
Route::get('/view_all_scorers','HomeController@view_all_scorers');
Route::get('/view_all_weekend','HomeController@view_all_weekend');
// viewing all basketball games from home
Route::get('/all_overs_basketball','HomeController@all_overs_basketball');
Route::get('/all_straight_basketball','HomeController@all_straight_basketball');

// nba home page
Route::get('/nba_home','HomeController@nba_home');

// adding subscriber
Route::post('/add_subscriber','AdminController@add_subscriber');
Route::get('/view_subscribers','AdminController@view_subscribers');
Route::get('/delete_subscriber/{id}','AdminController@delete_subscriber');
Route::get('/subscriber_mail/{id}','AdminController@subscriber_mail');
Route::post('/send_subscriber_mail/{id}','AdminController@send_subscriber_mail');
Route::get('/search_subscriber','AdminController@search_subscriber');

// adding contact
Route::post('/add_contact','AdminController@add_contact');
Route::get('/view_contacts','AdminController@view_contacts');
Route::get('/contact_details/{id}','AdminController@contact_details');
Route::get('/delete_contact/{id}','AdminController@delete_contact');
Route::get('/contact_mail/{id}','AdminController@contact_mail');
Route::post('/send_contact_mail/{id}','AdminController@send_contact_mail');

// adding the basketball games
Route::get('/add_basket_game','AdminController@add_basket_game');
Route::post('/save_basket_game','AdminController@save_basket_game');
Route::get('/basket_overs','AdminController@basket_overs');
Route::get('/basket_straight','AdminController@basket_straight');
Route::get('/basket_match_won/{id}','AdminController@basket_match_won');
Route::get('/basket_match_lost/{id}','AdminController@basket_match_lost');
Route::get('/basket_game_edit/{id}','AdminController@basket_game_edit');
Route::post('/update_basket_game/{id}','AdminController@update_basket_game');
// searching through basketball matches
Route::get('/search_basket_overs','AdminController@search_basket_overs');
Route::get('/search_basket_straight','AdminController@search_basket_straight');
// Adding the tennis page and it's games
Route::get('/tennis_home','HomeController@tennis_home');
Route::get('/add_tennis_game','AdminController@add_tennis_game');
Route::post('/save_tennis_game','AdminController@save_tennis_game');
Route::get('/tennis_straight','AdminController@tennis_straight');
Route::get('/search_tennis_straight','AdminController@search_tennis_straight');
Route::get('tennis_match_won/{id}','AdminController@tennis_match_won');
Route::get('tennis_match_lost/{id}','AdminController@tennis_match_lost');
Route::get('/tennis_game_edit/{id}','AdminController@tennis_game_edit');
Route::post('/update_tennis_game/{id}','AdminController@update_tennis_game');
Route::get('/all_straight_tennis','HomeController@all_straight_tennis');

// adding a number for subscribers
Route::get('/as','AdminController@as');
Route::post('save_as','AdminController@save_as');
Route::get('/edit_as/{id}','AdminController@edit_as');
Route::post('/save_edited_as/{id}','AdminController@save_edited_as');

// Deleting all the games except the scorer games
Route::get('/delete_all_games','AdminController@delete_all_games');
Route::get('/delete_over_basketball/{id}','AdminController@delete_over_basketball');
Route::get('/delete_all_basketball','AdminController@delete_all_basketball');
Route::get('/delete_tennis_games','AdminController@delete_tennis_games');
Route::get('/delete_scorer/{id}','AdminController@delete_scorer');
Route::get('/remove_tennis_game/{id}','AdminController@remove_tennis_game');
Route::get('/delete_football_game/{id}','AdminController@delete_football_game');
Route::get('/message_subscribers','AdminController@message_subscribers');
Route::post('/mail_all_subscribers','AdminController@mail_all_subscribers');
Route::get('/remove_football_straight/{id}','AdminController@remove_football_straight');
Route::get('/basket_straight_delete/{id}','AdminController@basket_straight_delete');
Route::get('/delete_all_weekend','AdminController@delete_all_weekend');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
