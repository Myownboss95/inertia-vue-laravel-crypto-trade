<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-lg mx-auto">
        <div class="avatar-title rounded-circle bg-light">
          <i class="bx bx-mail-send h2 mb-0 text-primary"></i>
        </div>
      </div>
      <div class="p-2 mt-4">
        <h4>Success !</h4>
        <p class="text-muted">
          At vero eos et accusamus et iusto odio dignissimos ducimus qui
          blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
          et
        </p>
        <div class="mt-4">
          <a href="index.html" class="btn btn-primary w-100">Back to Home</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import authVue from '@/views/layouts/auth.vue';
</script>

<script>
  export default {
    layout: authVue,
  };
</script>

<style>
</style>
