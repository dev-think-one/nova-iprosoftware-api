<?php

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

Route::get('/settings/contact-types', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsContactTypes'));
Route::get('/settings/booking-rules', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsBookingRules'));
Route::get('/settings/booking-tags', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsBookingTags'));
Route::get('/settings/sources', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsSources'));
Route::get('/settings/locations', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsLocations'));
Route::get('/settings/attributes', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiSettingsAttributes'));

Route::get('/contacts/get-contact', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiContactsGetContact'));

Route::get('/properties/get-property-all', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiPropertiesGetPropertyAll'));
Route::get('/properties/get-property-rates', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiPropertiesGetPropertyRates'));
Route::get('/properties/get-property-custom-rates', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiPropertiesGetPropertyCustomRates'));
Route::get('/properties/get-property-extras', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiPropertiesGetPropertyExtras'));
Route::get('/properties/properties-offers', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiPropertiesGetPropertyOffers'));

Route::get('/bookings/index', fn (NovaRequest $request) => inertia('NovaIprosoftwareApiBookingsIndex'));
