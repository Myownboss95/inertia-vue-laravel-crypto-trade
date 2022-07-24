<template>
    <input
        :name="name"
        :type="type"
        class="form-control"
        :id="id"
        :placeholder="placeholder"
        :value="modelValue"
        @input="handleInput"
    />
</template>

<script setup>
import { watch } from 'vue';

defineProps({
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    id: String,
    placeholder: String,
    modelValue: null,
})

const emit = defineEmits(['update:modelValue'])
const handleInput = (event) => {
    emit('update:modelValue', event.target.value);
}

</script>

<style>

</style>
