<template>
    <div>
        <settings-page
            :header="__('Attributes')"
            :is-empty="isEmpty"
            :is-requesting="isRequesting"
            @fetch-request="fetchRequest"
        >
            <accordion
                v-for="attribute in attributes"
                :key="attribute.Name"
                class="mb-1"
                :header="attribute.Name"
            >
                <ol class="text-white-50%">
                    <li
                        v-for="attributeInfo in attribute.Values"
                        :key="attributeInfo.Id"
                    >
                        (ID: {{ attributeInfo.Id }}) {{ attributeInfo.Name ? attributeInfo.Name : '-' }}
                    </li>
                </ol>
            </accordion>
        </settings-page>
    </div>
</template>

<script>
/* mixins */
import settingsPageMixin from '../../mixins/settings-pages/settingsPageMixin';
/* components */
import SettingsPage from '../../components/SettingsPage.vue';
import Accordion from '../../components/Accordion.vue';

export default {
    name: 'Attributes',
    mixins: [
        settingsPageMixin,
    ],
    components: {
        SettingsPage,
        Accordion,
    },
    data() {
        return {
            requestUrl: '/nova-vendor/iprosoftware-api/attributes',
            attributes: [],
        }
    },
    computed: {
        isEmpty() {
            return this.attributes.length <= 0;
        }
    },
    methods: {
        onRequestSuccess(response) {
            this.attributes = response.data.data;
            Nova.success(this.__('Success response. Fetched :count attributes sets.', {count: this.attributes.length}))
        },
        onRequestError(error) {
            this.attributes = [];
            Nova.error(this.__('It failed!'))
        },
    }

}
</script>

