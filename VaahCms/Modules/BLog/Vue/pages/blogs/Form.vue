<script setup>
import {onBeforeMount, onMounted, reactive, ref, watch} from "vue";
import { useBlogStore } from '../../stores/store-blogs'

import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {useRoute} from 'vue-router';

const store = useBlogStore();
const route = useRoute();
onMounted(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }
    await store.watchItem();

});


const onFileChange = async (event) => {
    console.log(event.files[0]);
    store.item.image = event.files[0];
}
//--------form_menu
const form_menu = ref();
const toggleFormMenu = (event) => {
    form_menu.value.toggle(event);
};
//--------/form_menu



</script>
<template>

    <div class="col-6" >

        <Panel >

            <template class="p-1" #header>


                <div class="flex flex-row">
                    <div class="p-panel-title">
                        <span v-if="store.item && store.item.id">
                            Update
                        </span>
                        <span v-else>
                            Create
                        </span>
                    </div>

                </div>


            </template>

            <template #icons>


                <div class="p-inputgroup">
                    <Button label="Save"
                            v-if="store.item && store.item.id"
                            data-testid="blogs-save"
                            @click="store.itemAction('save')"
                            icon="pi pi-save"/>

                    <Button label="Create & New"
                            v-else
                            @click="store.itemAction('create-and-new')"
                            data-testid="blogs-create-and-new"
                            icon="pi pi-save"/>


                    <!--form_menu-->
                    <Button
                        type="button"
                        @click="toggleFormMenu"
                        data-testid="blogs-form-menu"
                        icon="pi pi-angle-down"
                        aria-haspopup="true"/>

                    <Menu ref="form_menu"
                          :model="store.form_menu_list"
                          :popup="true" />
                    <!--/form_menu-->


                    <Button class="p-button-primary"
                            icon="pi pi-times"
                            data-testid="blogs-to-list"
                            @click="store.toList()">
                    </Button>
                </div>



            </template>


            <div v-if="store.item">
                <VhField label="Image">
                    <FileUpload mode="basic"
                                name="demo[]"
                                accept="image/*"
                                @select="onFileChange" />
                </VhField>

                <VhField label="Name">
                    <InputText class="w-full"
                               name="blogs-name"
                               data-testid="blogs-name"
                               v-model="store.item.name"/>
                </VhField>

                <VhField label="Slug">
                    <InputText class="w-full"
                               name="blogs-slug"
                               data-testid="blogs-slug"
                               v-model="store.item.slug"/>
                </VhField>


                <VhField label="Category">

                        <Dropdown v-model="store.item.category" :options="store.catagory" optionLabel="name" placeholder="Select a Category" class="w-full md:w-14rem" />

                </VhField>

                <VhField label="Taxonomies">

                    <MultiSelect v-model="store.item.taxonomies" :options="store.taxonomies" optionLabel="name"  placeholder="Select Taxonomies"
                                 :maxSelectedLabels="3" class="w-full md:w-14rem" />

                </VhField>


                <VhField label="Is Active">
                    <InputSwitch v-bind:false-value="0"
                                 v-bind:true-value="1"
                                 name="blogs-active"
                                 data-testid="blogs-active"
                                 v-model="store.item.is_active"/>
                </VhField>

            </div>
        </Panel>

    </div>

</template>
