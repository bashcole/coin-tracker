<?php

use App\Http\Controllers\Api\PriceHistoryController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\ExchangePairController;
use App\Http\Controllers\Api\PriceAlertController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/price-history/{symbol}/{timeframe}', [PriceHistoryController::class, 'show'])
    ->name('priceHistory.show')
    ->where(['symbol' => '[a-zA-Z-]+|@1', 'timeframe' => implode('|', array_keys(config('app.timeframes'))) . '|@2']);

Route::post('/price-alert/store', [PriceAlertController::class, 'store']);
Route::get('/exchange-pairs', [ExchangePairController::class, 'index']);
Route::get('/currency/{currency:symbol}', [CurrencyController::class, 'show'])->where(['symbol' => '[a-zA-Z-]+|@1']);
