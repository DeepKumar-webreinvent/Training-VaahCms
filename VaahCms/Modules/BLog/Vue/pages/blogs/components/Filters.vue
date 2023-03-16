<script  setup>

import { useBlogStore } from '../../../stores/store-blogs'
import VhFieldVertical from './../../../vaahvue/vue-three/primeflex/VhFieldVertical.vue'


const store = useBlogStore();

</script>

<template>
    <div>

        <Sidebar v-model:visible="store.show_filters"
                 position="right">

            <VhFieldVertical >
                <template #label>
                    <b>Sort By:</b>
                </template>

                <div class="field-radiobutton">
                    <RadioButton name="sort-none"
                                 data-testid="blogs-filters-sort-none"
                                 value=""
                                 v-model="store.query.filter.sort" />
                    <label for="sort-none">None</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="sort-ascending"
                                 data-testid="blogs-filters-sort-ascending"
                                 value="updated_at"
                                 v-model="store.query.filter.sort" />
                    <label for="sort-ascending">Updated (Ascending)</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="sort-descending"
                                 data-testid="blogs-filters-sort-descending"
                                 value="updated_at:desc"
                                 v-model="store.query.filter.sort" />
                    <label for="sort-descending">Updated (Descending)</label>
                </div>

            </VhFieldVertical>

            <Divider/>

            <VhFieldVertical >
                <template #label>
                    <b>Is Active:</b>
                </template>

                <div class="field-radiobutton">
                    <RadioButton name="active-all"
                                 value="null"
                                 data-testid="blogs-filters-active-all"
                                 v-model="store.query.filter.is_active" />
                    <label for="active-all">All</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="active-true"
                                 data-testid="blogs-filters-active-true"
                                 value="true"
                                 v-model="store.query.filter.is_active" />
                    <label for="active-true">Only Active</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="active-false"
                                 data-testid="blogs-filters-active-false"
                                 value="false"
                                 v-model="store.query.filter.is_active" />
                    <label for="active-false">Only Inactive</label>
                </div>

            </VhFieldVertical>

            <VhFieldVertical >
                <template #label>
                    <b>Trashed:</b>
                </template>

                <div class="field-radiobutton">
                    <RadioButton name="trashed-exclude"
                                 data-testid="blogs-filters-trashed-exclude"
                                 value=""
                                 v-model="store.query.filter.trashed" />
                    <label for="trashed-exclude">Exclude Trashed</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="trashed-include"
                                 data-testid="blogs-filters-trashed-include"
                                 value="include"
                                 v-model="store.query.filter.trashed" />
                    <label for="trashed-include">Include Trashed</label>
                </div>
                <div class="field-radiobutton">
                    <RadioButton name="trashed-only"
                                 data-testid="blogs-filters-trashed-only"
                                 value="only"
                                 v-model="store.query.filter.trashed" />
                    <label for="trashed-only">Only Trashed</label>
                </div>

            </VhFieldVertical>

            <VhFieldVertical >
                <template #label>
                    <b>Category:</b>
                </template>

                <div v-for="(value, index) in store.catagory" :key="value.id" class="flex align-items-center">
                    <div class="field-radiobutton">
                            <RadioButton v-model="store.query.filter.category"  name="category" :value="value.id" />
                            <label :for="value.name" class="ml-2">{{ value.name }}</label>
                    </div>
                </div>

            </VhFieldVertical>


        </Sidebar>

    </div>
</template>
