<template>
<select :name="name" :id="id" class="form-select" @change="handleChange">
    <option :value="key" v-for="(option, key) in options" :key="key" :selected="modelValue === key" > {{option}} </option>
</select>
</template>

<script setup>

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
    modelValue: null,
})
const emit = defineEmits(['update:modelValue']);

const handleChange = event => {
    emit('update:modelValue', event.target.value);
}

</script>

<style>

</style>
