<template>
    <div>
        <settings-page
            :header="__('Booking rules')"
            :is-empty="isEmpty"
            :is-requesting="isRequesting"
            @fetch-request="fetchRequest"
        >
            <div
                v-for="(rulesSet, ruleSetName) in rules"
                :key="ruleSetName"
                class="mb-2"
            >
                <h2 class="text-white text-xl mb-2">
                    {{ ruleSetName }}
                </h2>
                <accordion
                    v-for="rule in rulesSet"
                    :key="Array.isArray(rule)?rule[0].Id:rule.Id"
                    class="mb-1"
                    :header="Array.isArray(rule)?rule[0].Name + ' (' + rule[0].Id + ')':(rule.Name + ' (' + rule.Id + ')')"
                >
                    <code class="">
                        <pre>
                          {{ getTextContent(ruleSetName, rule) }}
                        </pre>
                    </code>
                </accordion>
            </div>
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
    name: 'BookingRules',
    mixins: [
        settingsPageMixin,
    ],
    components: {
        SettingsPage,
        Accordion,
    },
    data() {
        return {
            requestUrl: '/nova-vendor/iprosoftware-api/booking-rules',
            rules: {},
        }
    },
    computed: {
        isEmpty() {
            return Object.keys(this.rules).length <= 0;
        }
    },
    methods: {
        onRequestSuccess(response) {
            this.rules = response.data;
            Nova.success(this.__('Success response. Fetched :count rules sets.', {count: Object.keys(this.rules).length}));
        },
        onRequestError(error) {
            this.rules = {};
            Nova.error(this.__('It failed!'))
        },
        getTextContent(ruleSetName, rule) {
            let text = '';

            text = JSON.stringify(rule, null, 2);

            return text;
        }
    }

}
</script>
