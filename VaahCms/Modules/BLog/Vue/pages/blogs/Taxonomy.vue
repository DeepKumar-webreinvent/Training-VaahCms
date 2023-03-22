
<script setup>
import { useBlogStore } from '../../stores/store-blogs'
import {useRoute} from 'vue-router';
import {onMounted, ref, reactive} from "vue";

const store = useBlogStore();
const route = useRoute();

onMounted(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }
});

let taxonomies_name = reactive([]);
if ('taxonomies' in store.item) {
     let taxonomies = store.item.taxonomies;
    taxonomies.forEach(addTaxonomyName);
}
function addTaxonomyName(item, index) {
    taxonomies_name.push(item.name);
}
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

            <table class="table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(taxonomy, index) in store.taxonomies" :key="taxonomy.id">
                    <td>{{taxonomy.name}}</td>
                    <td>
                        <Button label="Submit" size="small"  rounded/>
                    </td>
                </tr>
                </tbody>
            </table>

        </Panel>
    </div>
</template>


<style scoped>

</style>
