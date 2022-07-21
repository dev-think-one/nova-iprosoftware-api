<?php
use Illuminate\Support\Facades\Route;

Route::get('/contact-types', \NovaIprosoftwareApi\Http\Controllers\Settings\ContactTypes\ListController::class);
Route::get('/booking-rules', \NovaIprosoftwareApi\Http\Controllers\Settings\BookingRules\ListController::class);
Route::get('/booking-tags', \NovaIprosoftwareApi\Http\Controllers\Settings\BookingTags\ListController::class);
Route::get('/sources', \NovaIprosoftwareApi\Http\Controllers\Settings\Sources\ListController::class);
Route::get('/locations', \NovaIprosoftwareApi\Http\Controllers\Settings\Locations\ListController::class);
Route::get('/attributes', \NovaIprosoftwareApi\Http\Controllers\Settings\Attributes\ListController::class);
