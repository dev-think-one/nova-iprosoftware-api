import SettingsContactTypes from './pages/settings-pages/ContactTypes';
import SettingsBookingRules from './pages/settings-pages/BookingRules';
import SettingsBookingTags from './pages/settings-pages/BookingTags';
import SettingsSources from './pages/settings-pages/Sources';
import SettingsLocations from './pages/settings-pages/Locations';
import SettingsAttributes from './pages/settings-pages/Attributes';
import ContactsGetContact from './pages/contacts-pages/GetContact';
import PropertiesGetPropertyAll from './pages/properties-pages/GetPropertyAll';
import PropertiesGetPropertyRates from './pages/properties-pages/GetPropertyRates';
import PropertiesGetPropertyCustomRates from './pages/properties-pages/GetPropertyCustomRates';
import PropertiesGetPropertyExtras from './pages/properties-pages/GetPropertyExtras';
import PropertiesGetPropertyOffers from './pages/properties-pages/GetPropertiesOffers';
import BookingsIndex from './pages/bookings-pages/Index.vue';

Nova.booting((app, store) => {
  Nova.inertia('NovaIprosoftwareApiSettingsContactTypes', SettingsContactTypes);
  Nova.inertia('NovaIprosoftwareApiSettingsBookingRules', SettingsBookingRules);
  Nova.inertia('NovaIprosoftwareApiSettingsBookingTags', SettingsBookingTags);
  Nova.inertia('NovaIprosoftwareApiSettingsSources', SettingsSources);
  Nova.inertia('NovaIprosoftwareApiSettingsLocations', SettingsLocations);
  Nova.inertia('NovaIprosoftwareApiSettingsAttributes', SettingsAttributes);

  Nova.inertia('NovaIprosoftwareApiContactsGetContact', ContactsGetContact);

  Nova.inertia('NovaIprosoftwareApiPropertiesGetPropertyAll', PropertiesGetPropertyAll);
  Nova.inertia('NovaIprosoftwareApiPropertiesGetPropertyRates', PropertiesGetPropertyRates);
  Nova.inertia('NovaIprosoftwareApiPropertiesGetPropertyCustomRates', PropertiesGetPropertyCustomRates);
  Nova.inertia('NovaIprosoftwareApiPropertiesGetPropertyExtras', PropertiesGetPropertyExtras);
  Nova.inertia('NovaIprosoftwareApiPropertiesGetPropertyOffers', PropertiesGetPropertyOffers);

  Nova.inertia('NovaIprosoftwareApiBookingsIndex', BookingsIndex);
});

