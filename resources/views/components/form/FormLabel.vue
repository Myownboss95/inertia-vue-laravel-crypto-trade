<template>
  <label class="form-label" for="{{for}}">{{label}}</label>
</template>

<script setup>
defineProps({
    for: String,
    label: String,
})
</script>

<style>

</style>
