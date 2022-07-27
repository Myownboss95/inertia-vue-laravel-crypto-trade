<template>
<div>
    <span class="spinner-border spinner-border-sm" v-if="props.loading"></span>
    <span v-else>{{props.text}}</span>
</div>
</template>

<script setup>
const props = defineProps({
    loading: false,
    text: null,
})
</script>

<style>

</style>
