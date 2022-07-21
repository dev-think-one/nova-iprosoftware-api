<?php

namespace NovaIprosoftwareApi;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaIprosoftwareApi extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-naviga-ad-preview', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-naviga-ad-preview', __DIR__.'/../dist/css/tool.css');
    }

    public function menu(Request $request)
    {
        return MenuSection::make('Iprosoftware Api', [
            MenuGroup::make('Settings', [
                MenuItem::make('Contact types', '/iprosoftware-api/settings/contact-types'),
                MenuItem::make('Booking rules', '/iprosoftware-api/settings/booking-rules'),
                MenuItem::make('Booking tags', '/iprosoftware-api/settings/booking-tags'),
                MenuItem::make('Sources', '/iprosoftware-api/settings/sources'),
                MenuItem::make('Locations', '/iprosoftware-api/settings/locations'),
                MenuItem::make('Attributes', '/iprosoftware-api/settings/attributes'),
            ])->collapsable(),
            MenuGroup::make('Contacts', [
                MenuItem::make('get-contact', '/iprosoftware-api/contacts/get-contact'),
            ])->collapsable(),
            MenuGroup::make('Properties', [
                MenuItem::make('get-property-all', '/iprosoftware-api/properties/get-property-all'),
                MenuItem::make('get-property-rates', '/iprosoftware-api/properties/get-property-rates'),
                MenuItem::make('get-property-custom-rates', '/iprosoftware-api/properties/get-property-custom-rates'),
                MenuItem::make('get-property-extras', '/iprosoftware-api/properties/get-property-extras'),
                MenuItem::make('properties-offers', '/iprosoftware-api/properties/properties-offers'),
            ])->collapsable(),
        ], 'library')
                          ->collapsable();
    }
}
