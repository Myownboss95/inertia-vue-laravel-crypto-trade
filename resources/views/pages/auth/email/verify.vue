<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-lg mx-auto">
        <div class="avatar-title rounded-circle bg-light">
          <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
        </div>
      </div>
      <div class="p-2 mt-4">
        <h4>Verify your email</h4>
        <p>
          We have sent you verification email
          <span class="fw-bold">example@abc.com</span>, Please check it
        </p>
        <div class="mt-4">
          <a href="index.html" class="btn btn-primary w-10">Verify email</a>
        </div>
      </div>
    </div>
    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Didn't receive an email ?
        <a href="#" class="text-primary fw-semibold"> Resend </a>
      </p>
    </div>
  </div>
</template>

<script setup>
import authVue from '@/views/layouts/auth.vue';
</script>

<script>
export default {
    layout: authVue
  };
</script>

<style>
</style>
