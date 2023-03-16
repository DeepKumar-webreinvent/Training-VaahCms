<script setup>
import {reactive, ref} from 'vue';

import Menu from 'primevue/menu';

const inputs = {
}
const data = reactive(inputs);
const height = ref(window.innerHeight)

const menu = ref();

const items = ref([
    {
        label: 'BLog',
        items: [
            {
                label: 'Dashboard',
                icon: 'fa-regular fa-chart-bar',
                to: "/"
            },
            {
                label: 'Blog',
                icon: 'fa-regular fa-chart-bar',
                to: "/blogs"
            },
            {
                label: 'Category',
                icon: 'fa-regular fa-chart-bar',
                to: "/catogories"
            },
        ]
    },
]);

</script>
<template>

    <div v-if="height">
        <Menu :model="items" />
    </div>


</template>


