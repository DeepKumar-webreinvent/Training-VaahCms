
<script setup>
import { useBlogStore } from '../../stores/store-blogs'
import {useRoute} from 'vue-router';


const store = useBlogStore();
const route = useRoute();

</script>

<template>
    <div class="col-6" >
        <Panel >
            <template class="p-1" #header>
                <div class="flex flex-row">
                    <div class="p-panel-title">
                            <span>
                                Taxonomies
                            </span>
                    </div>

                </div>
            </template>

            <template>

            </template>

        </Panel>
    </div>
</template>


<style scoped>

</style>
