<?php
use Illuminate\Support\Facades\Route;

Route::get('/properties/properties-offers', \NovaIprosoftwareApi\Http\Controllers\Properties\Offers\OffersListController::class);
Route::get('/properties/{ipro_id}', \NovaIprosoftwareApi\Http\Controllers\Properties\ShowController::class);
Route::get('/properties/{ipro_id}/rates', \NovaIprosoftwareApi\Http\Controllers\Properties\RatesListController::class);
Route::get('/properties/{ipro_id}/custom-rates', \NovaIprosoftwareApi\Http\Controllers\Properties\CustomRatesListController::class);
Route::get('/properties/{ipro_id}/extras', \NovaIprosoftwareApi\Http\Controllers\Properties\ExtrasListController::class);
