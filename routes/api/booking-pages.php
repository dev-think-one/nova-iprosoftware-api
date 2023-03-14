<?php
use Illuminate\Support\Facades\Route;

Route::get('/bookings', \NovaIprosoftwareApi\Http\Controllers\Bookings\IndexController::class);
