<template>
    <Card
        class="p-4 min-h-40 flex flex-col items-center justify-center"
        :style="{
                opacity: isRequesting?0.5:1
            }"
    >
        <div v-if="isRequesting">
            <p class="text-white-50% text-lg flex flex-col items-center justify-center">
                {{ __('Requesting Now') }}
                <Loader class="text-gray-300"/>
            </p>
        </div>
        <div v-else-if="!isEmpty" class="w-full p-3">
            <pre v-if="responseData" class="text-white-50%"><code>{{ JSON.stringify(responseData, null, 2) }}</code></pre>
            <slot v-else />
        </div>
        <div v-else>
            <p class="text-white-50% text-lg">
                {{ __('Sorry, but there empty list') }}
            </p>
        </div>
    </Card>
</template>

<script>
export default {
    name: "ResultCard",
    props: {
        responseData: {
            type: [Object, Array],
            default: null,
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
