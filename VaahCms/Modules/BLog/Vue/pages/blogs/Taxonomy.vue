
<script setup>
import { useBlogStore } from '../../stores/store-blogs'
import {useRoute} from 'vue-router';
import {onMounted, ref, reactive, computed, onBeforeMount} from "vue";

const store = useBlogStore();
const route = useRoute();


onBeforeMount(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }

});

function checkTagstatus(tags, currentTag)
{
         const tagsName = tags.map((value) => [value.name].join(","));

         return  (tagsName.includes(currentTag.name));
}

</script>

<template>
    <div class="col-6" >
        <Panel >
            <template class="p-1" #header>
                    <div class="p-panel-title">
                            <span>
                                Tag
                            </span>
                    </div>
            </template>


            <template #icons>
                        <Button class="p-button-primary"
                                icon="pi pi-times"
                                data-testid="blogs-to-list"
                                @click="store.toList()">
                        </Button>
            </template>


            <table class="table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(tag) in store.tags" :key="tag.id">
                    <td>{{tag.name}}</td>
                    <td>
                        <Button label="Yes"  size="small" severity="success"
                                v-if="checkTagstatus(store.item.tags, tag)"
                                @click="store.changeStatus( store.item.id, tag.id)" rounded/>
                        <Button label="No"  size="small" v-else
                                @click="store.changeStatus( store.item.id, tag.id)" rounded/>
                    </td>
                </tr>
                </tbody>
            </table>

        </Panel>
    </div>
</template>


<style scoped>
.table tr td{
    text-align: center;
}
</style>
