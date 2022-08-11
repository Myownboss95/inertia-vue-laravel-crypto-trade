<template>
<div>
    <FormLabel :for="id" :label="label" v-if="label" />
    <select :name="name" :id="id" class="form-select" @change="handleChange">
        <option :value="key" v-for="(option, key) in options" :key="key" :selected="modelValue === key" > {{option}} </option>
    </select>
</div>
</template>

<script setup>
import FormLabel from './FormLabel.vue';
const props = defineProps({
    name: {
        type: String,
        default: 'select',
    },
    id: {
        type: String,
        default: 'selectId',
    },
    options: {
        type: Object,
        default: {},
    },
    label: String,
    modelValue: null,

})
const emit = defineEmits(['update:modelValue']);

const handleChange = event => {
    emit('update:modelValue', event.target.value);
}

</script>

<style>

</style>
