<script setup>
import {onBeforeMount, onMounted, reactive, ref, watch} from "vue";
import { useBlogStore } from '../../stores/store-blogs'
import axios from 'axios'

import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {useRoute} from 'vue-router';
import {vaah} from "../../vaahvue/pinia/vaah";
import { useToast } from "primevue/usetoast";
const toast = useToast();


const store = useBlogStore();
const route = useRoute();
// let attachment = reactive([]);
let newImagesName = reactive([]);


let base_url = document.getElementsByTagName('base')[0].getAttribute("href");
let ajax_url = base_url + "/backend/blog/blogs";

onMounted(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }
    await store.watchItem();
});

const removeImage =  (imageName) => {
    newImagesName = store.item.images_name.filter(item => item !== imageName);
    store.item.images_name = newImagesName;

    let newAttachment = store.attachment.filter(item => item.name !== imageName);
    store.attachment = newAttachment;
}

const onFileChange = async (event) => {
    const config = {
        headers: {
            'content-type': 'multipart/form-data',
        }
    }

    let selectedFiles = event.files;
    if(!selectedFiles.length)
    {
        return false;
    }

    for(let i=0; i<selectedFiles.length; i++){
         store.attachment.push(selectedFiles[i]);
    }

    let formData  = new FormData();
    for(let i=0; i<store.attachment.length; i++){
        formData.append('images[]',store.attachment[i]);
    }

    let url =  ajax_url+ "/image/upload";
    await  axios.post(url, formData, config).then(res =>{
        let uniqueFilesName = res.data.files_name.filter((value, index, array) => array.indexOf(value) === index);

        if(route.params && route.params.id)
        {
                let filesNames=  store.item.images_name.concat(uniqueFilesName);
                let updatedFilesNames = filesNames.filter((value, index, array) => array.indexOf(value) === index);

                store.item.images_name = updatedFilesNames;

        }
        else{
            store.item.images_name = uniqueFilesName;
        }

        toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
        store.image_show = true;
    }).catch(error => {
        console.log("errors" + error);
    });

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
                    <FileUpload  @uploader="onFileChange($event)"
                                 customUpload
                                 :multiple="true"
                                 accept="image/*"
                                 :maxFileSize="1000000">
                        <template #empty>
                            <p>Drag and drop files to here to upload.</p>
                        </template>
                    </FileUpload>

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

                        <Dropdown v-model="store.item.category"
                                  :options="store.catagory"
                                  optionLabel="name"
                                  placeholder="Select a Category"
                                  class="w-full md:w-14rem" />

                </VhField>

                <VhField label="Tags">

                    <MultiSelect v-model="store.item.tags"
                                 :options="store.tags"
                                 optionLabel="name"
                                 placeholder="Select Tags"
                                 :maxSelectedLabels="3"
                                 class="w-full md:w-14rem" />

                </VhField>


                <VhField label="Is Active">
                    <InputSwitch v-bind:false-value="0"
                                 v-bind:true-value="1"
                                 name="blogs-active"
                                 data-testid="blogs-active"
                                 v-model="store.item.is_active"/>
                </VhField>

                <hr>

                <div class="grid container" v-if="store.image_show">
                    <div class="col-3 col-offset-1"  v-for="(image,i) in store.item.images_name" :key="i">

                        <Image :src="base_url + '/images/' +image"
                               preview
                               alt="Image"
                               width="500" />
                        <Button class="p-button-primary"
                                icon="pi pi-times"
                                data-testid="blogs-to-list"
                                @click="removeImage(image)">
                        </Button>
                    </div>
                </div>

            </div>
        </Panel>

    </div>

</template>
