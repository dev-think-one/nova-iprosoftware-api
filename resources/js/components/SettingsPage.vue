<template>
    <div>
        <Heading class="mb-6">{{ header ? header : __('Setting Page') }}</Heading>

        <DefaultButton
            class="w-full flex justify-center mb-2"
            :disabled="isRequesting"
            @click.prevent="$emit('fetch-request')"
        >
            {{ buttonText ? buttonText : __('Fetch directly from api') }}
        </DefaultButton>
        <ResultCard
            :is-empty="isEmpty"
            :is-requesting="isRequesting"
        >
            <slot/>
        </ResultCard>
    </div>
</template>

<script>
/* components */
import ResultCard from './ResultCard.vue';

export default {
    name: "SettingsPage",
    components: {ResultCard},
    props: {
        header: {
            type: String,
            default: '',
        },
        buttonText: {
            type: String,
            default: '',
        },
        isEmpty: {
            type: Boolean,
            default: true,
        },
        isRequesting: {
            type: Boolean,
            default: true,
        },
    }
}
</script>
