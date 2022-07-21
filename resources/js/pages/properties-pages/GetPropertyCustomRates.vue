<template>
    <div>
        <Heading class="mb-6">{{ __('Get Property Custom Rates') }}</Heading>
        <div class="flex mb-4">
            <input
                type="number"
                step="1"
                min="1"
                placeholder="Ipro ID"
                v-model="iproId"
                class="appearance-none rounded h-10 pl-4 w-full focus:bg-white focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600"
            />
            <div class="flex ml-2">
                <DefaultButton
                    class="w-full flex justify-center mb-2 whitespace-nowrap"
                    :disabled="isRequesting || !iproId"
                    @click.prevent="fetchRequest"
                >
                    {{ buttonText ? buttonText : __('Fetch directly from api') }}
                </DefaultButton>
            </div>
        </div>
        <ResultCard
            :response-data="responseData"
            :is-empty="isEmpty"
            :is-requesting="isRequesting"
        />
    </div>
</template>

<script>
/* mixins */
import settingsPageMixin from '../../mixins/settings-pages/settingsPageMixin';
/* components */
import ResultCard from '../../components/ResultCard.vue';

export default {
    name: 'GetPropertyCustomRates',
    mixins: [
        settingsPageMixin,
    ],
    components: {ResultCard},
    data() {
        return {
            requestUrl: '/nova-vendor/iprosoftware-api/properties/',
            iproId: null,
            noFetchOnMount: true,
            responseData: [],
        }
    },
    computed: {
        isEmpty() {
            return this.responseData.length <= 0;
        }
    },
    methods: {
        onRequestSuccess(response) {
            this.responseData = response.data.data;
            Nova.success(this.__('Success response. Fetched property rates count: :count.', {count: this.responseData.length}))
        },
        onRequestError(error) {
            this.rates = {};
            Nova.error(this.__('It failed!'))
        },
        getRequestUrl() {
            return this.requestUrl + this.iproId + '/custom-rates';
        }
    }
}
</script>
