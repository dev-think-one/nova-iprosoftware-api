<?php
use Illuminate\Support\Facades\Route;

Route::get('/contacts/{ipro_id}', \NovaIprosoftwareApi\Http\Controllers\Contacts\ShowController::class);
