
<script setup>
import { useBlogStore } from '../../stores/store-blogs'
import {useRoute} from 'vue-router';
import {onMounted, ref, reactive, computed } from "vue";

const store = useBlogStore();
const route = useRoute();
// const selectedCategories = ref(['comedy']);

onMounted(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }

});

let taxonomies = store.item.taxonomies;
let blogId= store.item.id;
function checkTaxonomystatus(taxonomies, currentTaxonomy)
{
         const taxonomiesName = taxonomies.map(getTaxonomiesName);

         function getTaxonomiesName(value) {
             return [value.name].join(",");
         }

         return  (taxonomiesName.includes(currentTaxonomy.name));
}

</script>

<template>
    <div class="col-6" >
        <Panel >
            <template class="p-1" #header>
                <div class="flex flex-row justify-content-between">
                    <div class="p-panel-title">
                            <span>
                                Tag
                            </span>
                    </div>

                    <div class="ml-4">
                        <Button class="p-button-primary"
                                icon="pi pi-times"
                                data-testid="blogs-to-list"
                                @click="store.toList()">
                        </Button>
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
                        <Button label="Yes"  size="small" severity="success"
                                v-if="checkTaxonomystatus(taxonomies, taxonomy)"
                                @click="store.changeStatus(blogId, taxonomy.id)" rounded/>
                        <Button label="No"  size="small" v-else
                                @click="store.changeStatus(blogId, taxonomy.id)" rounded/>
                </tr>
                </tbody>
            </table>

        </Panel>
    </div>
</template>


<style scoped>

</style>
