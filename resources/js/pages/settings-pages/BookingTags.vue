<template>
    <div>
        <settings-page
        :header="__('Booking tags')"
        :is-empty="isEmpty"
        :is-requesting="isRequesting"
        @fetch-request="fetchRequest"
        >
            <ol class="text-white-50%">
                <li
                    v-for="source in sources"
                    :key="source.Id"
                >
                    (ID: {{source.Id}}) {{source.Name ? source.Name : '-'}}
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
        name: 'BookingTags',
        mixins: [
            settingsPageMixin,
        ],
        components: {
            SettingsPage,
        },
        data() {
            return {
                requestUrl: '/nova-vendor/iprosoftware-api/sources',
                sources: [],
            }
        },
        computed: {
            isEmpty() {
                return this.sources.length <= 0;
            }
        },
        methods: {
            onRequestSuccess(response){
                this.sources = response.data.data;
                Nova.success(this.__('Success response. Fetched :count tags.', {count: this.sources.length}))
            },
            onRequestError(error){
                this.sources = [];
                Nova.error(this.__('It failed!'))
            },
        }
    }
</script>
