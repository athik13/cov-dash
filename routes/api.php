<?php

use Illuminate\Http\Request;
use App\CurrentStat;
use App\DailyCases;
use Illuminate\Support\Facades\Http;

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

Route::group([
    'prefix' => 'auth'
  ], function () {
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('forgetpassword','AuthController@forgetPassword');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user','AuthController@user');
        Route::get('logout','AuthController@logout');
    });
});

Route::group(['prefix' => 'data'], function () {
    Route::get('latest-stats', function() {
        $currentStat = CurrentStat::first();
        return response()->json([
            'data' => $currentStat
        ]);
    });

    Route::get('daily-cases', function() {
        $dailycases = DailyCases::all();
        return response()->json([
            'data' => $dailycases
        ]);
    });

    Route::get('update-from-hpa', function() {
        $hpa = Http::get('http://covid19.health.gov.mv/api/fetch_stats');
        $hpa = json_decode($hpa);

        // $currentStat = new CurrentStat;
        $currentStat = CurrentStat::first();

        $currentStat->totalConfirmedCases = $hpa->local->surveillance[0]->statistic;
        $currentStat->recovered = $hpa->local->surveillance[3]->statistic;
        $currentStat->active = $hpa->local->surveillance[5]->statistic;
        $currentStat->deaths = $hpa->local->surveillance[4]->statistic;

        $currentStat->locals = $hpa->local->surveillance[1]->statistic;
        $currentStat->foreigners = $hpa->local->surveillance[2]->statistic;

        $currentStat->active_in_maldives = $hpa->local->surveillance[5]->statistic;
        $currentStat->active_out_of_country = $hpa->local->surveillance[6]->statistic;

        $currentStat->isolation = $hpa->local->surveillance[7]->statistic;
        $currentStat->quarantine = $hpa->local->surveillance[8]->statistic;

        $currentStat->save();

        return $currentStat;
    });
});
