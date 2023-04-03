<script setup>
import {vaah} from '../../pinia/vaah.js'
import {reactive, ref} from "vue";
let base_url = document.getElementsByTagName('base')[0].getAttribute("href");

const props = defineProps({
    label: {
        type: String,
        default: null
    },
    label_width: {
        type: String,
        default: '150px'
    },
    value:{
        default: null,
    },
    type: {
        type: String,
        default: 'text'
    },
    can_copy:{
        type: Boolean,
        default: false
    }
})

const visible = ref(false);
let imagesName = reactive([]);

const showImage = (images) => {
    imagesName.splice(0, imagesName.length);
    images.forEach(getImagesName)

    function getImagesName(item) {
        imagesName.push(item.image_name);
    }
    visible.value = true;
}

//['label', 'value', 'type']

</script>
<template>
    <tr>
        <td :style="{width: label_width}"><b>{{vaah().toLabel(label)}}</b></td>
        <template v-if="can_copy">
            <td>{{value}}</td>
            <td style="width: 40px;">
                <Button icon="pi pi-copy" @click="vaah().copy(value)" class=" p-button-text"></Button>
            </td>
        </template>
        <template v-else-if="type==='user'">
            <td colspan="2" >

                <template v-if="typeof value === 'object' && value !== null">
                    <Button  @click="vaah().copy(value.id)"  class="p-button-outlined p-button-secondary p-button-sm">
                        {{value.name}}
                    </Button>
                </template>

            </td>
        </template>
        <template v-else-if="type==='yes-no'">
            <td colspan="2">
                <Tag value="Yes" v-if="value===1" severity="success"></Tag>
                <Tag v-else value="No" severity="danger"></Tag>
            </td>
        </template>
        <template v-else-if="type==='image'">
            <Button label="Show"
                    icon="pi pi-external-link"
                    @click="showImage(value)"
                    v-if="value.length > 0"/>
            <p v-else> - </p>
            <Dialog v-model:visible="visible" maximizable  header="Image">
                <div class="grid container">
                    <div class="col-3 col-offset-1"  v-for="(image,i) in imagesName" :key="i">
                        <img :src="base_url + '/images/' +image"
                             alt="image"
                             width="1000"
                             height="1000">
                    </div>
                </div>
            </Dialog>
        </template>

        <template v-else-if="type==='tag'">
            <td colspan="2">
                <div v-for="(tag) in value">
                    <Tag :value="tag.name"></Tag>
                </div>
            </td>
        </template>

        <template v-else>
            <td  colspan="2">{{value}}</td>
        </template>

    </tr>
</template>
