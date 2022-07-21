<template>
    <div>
        <Heading class="mb-6">{{ __('Offers') }}</Heading>
        <div class="flex mb-4">
            <select v-model="type" class="flex-grow">
                <option :key="offerType" v-for="offerType in ['SpecificDates','LastMinute', 'SpecificDates']"
                        :value="offerType">
                    {{ offerType }}
                </option>
            </select>
            <div class="flex ml-4">
                <DefaultButton
                    class="w-full flex justify-center mb-2 whitespace-nowrap"
                    :disabled="isRequesting || !type"
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
import ResultCard from "../../components/ResultCard";

export default {
    name: 'GetPropertiesOffers',
    mixins: [
        settingsPageMixin,
    ],
    components: {ResultCard},
    data() {
        return {
            requestUrl: '/nova-vendor/iprosoftware-api/properties/properties-offers',
            type: 'SpecificDates',
            noFetchOnMount: false,
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
            Nova.success(this.__('Success response. Fetched offers count: :count.', {count: this.responseData.length}))
        },
        onRequestError(error) {
            this.responseData = [];
            Nova.error(this.__('It failed!'))
        },
        getRequestData() {
            return {
                params: {
                    type: this.type,
                }
            };
        }
    }
}
</script>
