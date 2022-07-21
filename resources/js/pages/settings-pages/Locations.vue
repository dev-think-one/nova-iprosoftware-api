<template>
    <div>
        <settings-page
            :header="__('Sources')"
            :is-empty="isEmpty"
            :is-requesting="isRequesting"
            @fetch-request="fetchRequest"
        >
            <ol class="text-white-50%">
                <li
                    v-for="location in locations"
                    :key="location.Id"
                >
                    (ID: {{location.Id}}) {{location.Name ? location.Name : '-'}}
                    <ul v-if="location.Children.length">
                        <li
                            v-for="child in location.Children"
                            :key="child.Id"
                        >
                            (ID: {{child.Id}}) {{child.Name ? child.Name : '-'}}
                            <div v-if="child.Children.length">
                                {{__('Location has :count children', {count: child.Children.length})}}
                            </div>
                        </li>
                    </ul>
                </li>
            </ol>
        </settings-page>
    </div>
</template>

<script>
    /* mixins */
    import settingsPageMixin from '../../mixins/settings-pages/settingsPageMixin';
    /* components */
    import SettingsPage from '../../components/SettingsPage.vue';

    export default {
        name: 'Sources',
        mixins: [
            settingsPageMixin,
        ],
        components: {
            SettingsPage,
        },
        data() {
            return {
                requestUrl: '/nova-vendor/iprosoftware-api/locations',
                locations: [],
            }
        },
        computed: {
            isEmpty() {
                return this.locations.length <= 0;
            }
        },
        methods: {
            onRequestSuccess(response){
                this.locations = response.data.data;
                Nova.success(this.__('Success response. Fetched :count locations.', {count: this.locations.length}))
            },
            onRequestError(error){
                this.locations = [];
                Nova.error(this.__('It failed!'))
            },
        }

    }
</script>
