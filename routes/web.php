<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

/**
 * Auth Routes
 */
Auth::routes(['verify' => false]);


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::middleware('auth')->group(function () {
        /**
         * Home Routes
         */
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        /**
         * Role Routes
         */    
        Route::resource('roles', RolesController::class);
        /**
         * Permission Routes
         */    
        Route::resource('permissions', PermissionsController::class);
        /**
         * Hint Routes
         */    
        Route::get('/hint', [App\Http\Controllers\HintController::class, 'index'])->name('hint.index');
        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * Criteria Routes
         */    
        Route::group(['prefix' => 'criterias'], function() {
            Route::get('/', 'CriteriaController@index')->name('criterias.index');
            Route::get('/create', 'CriteriaController@create')->name('criterias.create');
            Route::post('/create', 'CriteriaController@store')->name('criterias.store');
            Route::get('/{criteria}/show', 'CriteriaController@show')->name('criterias.show');
            Route::get('/{criteria}/edit', 'CriteriaController@edit')->name('criterias.edit');
            Route::patch('/{criteria}/update', 'CriteriaController@update')->name('criterias.update');
            Route::delete('/{criteria}/delete', 'CriteriaController@destroy')->name('criterias.destroy');
        });

        /**
         * Weight Routes
         */    
        Route::group(['prefix' => 'weights'], function() {
            Route::get('/', 'WeightController@index')->name('weights.index');
            Route::get('/create', 'WeightController@create')->name('weights.create');
            Route::post('/create', 'WeightController@store')->name('weights.store');
            Route::get('/{weight}/show', 'WeightController@show')->name('weights.show');
            Route::get('/{weight}/edit', 'WeightController@edit')->name('weights.edit');
            Route::patch('/{weight}/update', 'WeightController@update')->name('weights.update');
            Route::delete('/{weight}/delete', 'WeightController@destroy')->name('weights.destroy');
        });

        /**
         * Jury Routes
         */ 
        Route::group(['prefix' => 'juries'], function() {
            Route::get('/', 'JuryController@index')->name('juries.index');
            Route::get('/create', 'JuryController@create')->name('juries.create');
            Route::post('/create', 'JuryController@store')->name('juries.store');
            Route::get('/{jury}/show', 'JuryController@show')->name('juries.show');
            Route::get('/{jury}/edit', 'JuryController@edit')->name('juries.edit');
            Route::patch('/{jury}/update', 'JuryController@update')->name('juries.update');
            Route::delete('/{jury}/delete', 'JuryController@destroy')->name('juries.destroy');
        });

        /**
         * Team Routes
         */    
        Route::group(['prefix' => 'teams'], function() {
            Route::get('/', 'TeamController@index')->name('teams.index');
            Route::get('/create', 'TeamController@create')->name('teams.create');
            Route::post('/create', 'TeamController@store')->name('teams.store');
            Route::get('/{team}/show', 'TeamController@show')->name('teams.show');
            Route::get('/{team}/edit', 'TeamController@edit')->name('teams.edit');
            Route::patch('/{team}/update', 'TeamController@update')->name('teams.update');
            Route::delete('/{team}/delete', 'TeamController@destroy')->name('teams.destroy');
            Route::post('/import', 'TeamController@import')->name('teams.import');
        });

        /**
         * Paper Routes
         */    
        Route::group(['prefix' => 'papers'], function() {
            Route::get('/{team}', 'PaperController@index')->name('papers.index');
            Route::get('/{team}/create', 'PaperController@create')->name('papers.create');
            Route::post('/{team}/create', 'PaperController@store')->name('papers.store');
            Route::get('/{team}/{paper}/show', 'PaperController@show')->name('papers.show');
            Route::get('/{team}/{paper}/edit', 'PaperController@edit')->name('papers.edit');
            Route::patch('/{team}/{paper}/update', 'PaperController@update')->name('papers.update');
            Route::delete('/{team}/{paper}/delete', 'PaperController@destroy')->name('papers.destroy');
        });

        /**
         * GMM Routes
         */    
        Route::group(['prefix' => 'calculation'], function() {
            Route::get('/penilaian', 'AssessmentController@index')->name('gmm.jury.index');
            Route::get('/penilaian/{gmm}', 'AssessmentController@assignView')->name('gmm.jury.assignView');
            Route::post('/penilaian/{gmm}', 'AssessmentController@assignSave')->name('gmm.jury.assignStore');
            
            Route::get('/assessment', 'GMMController@index')->name('gmm.index');
            Route::get('/', 'GMMController@assessment')->name('gmm.assessment');
            Route::get('/create', 'GMMController@create')->name('gmm.create');
            Route::post('/create', 'GMMController@store')->name('gmm.store');
            Route::get('/{gmm}/show', 'GMMController@show')->name('gmm.show');
            Route::get('/{gmm}/edit', 'GMMController@edit')->name('gmm.edit');
            Route::patch('/{gmm}/update', 'GMMController@update')->name('gmm.update');
            Route::delete('/{gmm}/delete', 'GMMController@destroy')->name('gmm.destroy');
            Route::get('/{gmm}/assign-gmm', 'GMMController@assignView')->name('gmm.assignView');
            
            Route::get('/{gmm}/calculate', 'GMMController@calculate')->name('gmm.calculate');
            Route::post('/{gmm}/export-csv', 'GMMController@exportCsv')->name('gmm.exportCsv');

            Route::post('/{gmm}/assign-gmm-save', 'GMMController@assignSave')->name('gmm.assignStore');
            Route::get('/{gmm}/result-gmm', 'GMMController@resultView')->name('gmm.resultView');
            Route::get('/{gmm}/result-entropy', 'CriteriaEntropyController@resultView')->name('entropy.resultView');
            Route::get('/{gmm}/result-topsis', 'RankingTopsisController@resultView')->name('topsis.resultView');

            Route::group(['prefix' => '/{gmm}/sessions'], function() {
                Route::get('/', 'GMMSessionController@index')->name('gmmSessions.index');
                Route::get('/create', 'GMMSessionController@create')->name('gmmSessions.create');
                Route::post('/create', 'GMMSessionController@store')->name('gmmSessions.store');
                Route::get('/{gmmSession}/show', 'GMMSessionController@show')->name('gmmSessions.show');
                Route::get('/{gmmSession}/edit', 'GMMSessionController@edit')->name('gmmSessions.edit');
                Route::patch('/{gmmSession}/update', 'GMMSessionController@update')->name('gmmSessions.update');
                Route::delete('/{gmmSession}/delete', 'GMMSessionController@destroy')->name('gmmSessions.destroy');

                Route::group(['prefix' => '/{session}/teams'], function() {
                    Route::get('/', 'GMMTeamController@index')->name('gmmTeams.index');
                    Route::get('/create', 'GMMTeamController@create')->name('gmmTeams.create');
                    Route::post('/create', 'GMMTeamController@store')->name('gmmTeams.store');
                    Route::get('/{gmmTeam}/show', 'GMMTeamController@show')->name('gmmTeams.show');
                    Route::get('/{gmmTeam}/edit', 'GMMTeamController@edit')->name('gmmTeams.edit');
                    Route::patch('/{gmmTeam}/update', 'GMMTeamController@update')->name('gmmTeams.update');
                    Route::delete('/{gmmTeam}/delete', 'GMMTeamController@destroy')->name('gmmTeams.destroy');
                });

                Route::group(['prefix' => '/{session}/juries'], function() {
                    Route::get('/', 'GMMJuryController@index')->name('gmmJuries.index');
                    Route::get('/create', 'GMMJuryController@create')->name('gmmJuries.create');
                    Route::post('/create', 'GMMJuryController@store')->name('gmmJuries.store');
                    Route::get('/{gmmJury}/show', 'GMMJuryController@show')->name('gmmJuries.show');
                    Route::get('/{gmmJury}/edit', 'GMMJuryController@edit')->name('gmmJuries.edit');
                    Route::patch('/{gmmJury}/update', 'GMMJuryController@update')->name('gmmJuries.update');
                    Route::delete('/{gmmJury}/delete', 'GMMJuryController@destroy')->name('gmmJuries.destroy');
                });
            });
            
        });
    });
});
