<template>
    <div>
        <Heading class="mb-6">{{ __('Bookings') }}</Heading>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow divide-y divide-gray-100 dark:divide-gray-700">
            <div
                v-for="(val, searchParam) in searchQuery"
                :key="searchParam"
                class="flex flex-col md:flex-row"
            >
                <div class="px-6 md:px-8 mt-2 md:mt-0 w-full md:w-1/5 md:py-5">
                    <label
                        :for="`input-${searchParam}`"
                        class="inline-block pt-2 leading-tight space-x-1">
                        <span>
                            {{ searchParam }}
                        </span>
                    </label>
                </div>
                <div class="mt-1 md:mt-0 pb-5 px-6 md:px-8 md:w-3/5 w-full md:py-5">
                    <div class="space-y-1">
                        <input
                            v-model="searchQuery[searchParam]"
                            type="text"
                            :placeholder="searchParam"
                            class="w-full form-control form-input form-input-bordered"
                            :id="`input-${searchParam}`"
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mb-4">
            <div class="flex mt-3 ml-2">
                <DefaultButton
                    class="w-full flex justify-center mb-2 whitespace-nowrap"
                    :disabled="isRequesting"
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
    name: 'BookingsIndex',
    mixins: [
        settingsPageMixin,
    ],
    components: {ResultCard},
    data() {
        return {
            requestUrl: '/nova-vendor/iprosoftware-api/bookings/',
            searchQuery: {
                size: null,
                index: null,
                Sort: null,
                SortDirection: null,
                BookingStatus: null,
                contactIDs: null,
                orderDateFrom: null,
                orderDateTo: null,
                checkinfrom: null,
                checkinto: null,
                LocationId: null,
                IncludeBookingTags: null,
                ExcludeBookingTags: null,
                modifiedTimeFrom: null,
                bookingID: null,
            },
            noFetchOnMount: false,
            responseData: {},
        }
    },
    computed: {
        isEmpty() {
            return !this.responseData?.Items || Object.keys(this.responseData?.Items).length <= 0;
        }
    },
    methods: {
        onRequestSuccess(response) {
            this.responseData = response.data.data;
            Nova.success(this.__('Success response. Total hits: :count.', {count: this.responseData?.TotalHits}))
        },
        onRequestError(error) {
            this.responseData = {};
            Nova.error(this.__('It failed!'))
        },
        getRequestData() {
            return {
                params: {
                    search: this.searchQuery
                }
            };
        }
    }

}
</script>
