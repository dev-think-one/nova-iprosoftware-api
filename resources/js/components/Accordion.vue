<template>
    <article class="">
        <div class="border border-white-50% p-1 rounded">
            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                <span class="text-lg font-medium">
                    {{ header }}
                </span>
                <Icon type="plus-circle"
                      class="w-7 h-7"
                      @click.prevent="toggleOpen"
                      :style="{
                           transform: 'rotate('+(isOpen?'135':'0')+'deg)',
                           transition: 'transform 0.5s'
                        }"
                />
            </header>
            <transition name="fade">
                <div v-if="isOpen">
                    <div class="pl-8 pr-8 pt-4 border-t">
                        <slot/>
                    </div>
                </div>
            </transition>
        </div>
    </article>
</template>

<script>
import { ref } from 'vue'

export default {
    name: "Accordion",
    props: {
        header: {
            type: String,
            default: ''
        },
    },
    setup() {
        const isOpen = ref(false);

        const toggleOpen = () => {
            isOpen.value = !isOpen.value
        }

        return {
            isOpen,
            toggleOpen
        };
    },
}
</script>
