<template>
  <div id="layout-wrapper">
    <HeaderVue />
    <SidebarVue />

    <!-- Main content -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- Page Content -->
          <!-- <slot /> -->
          <!-- End page content -->
        </div>
        <!-- container-fluid -->
      </div>

      <!-- End Page-content -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="text-end">{{ new Date().getFullYear() }} © Minia.</div>
        </div>
      </footer>
    </div>
  </div>
</template>

<script setup>
  import defaultVue from './default.vue';
  import HeaderVue from '../components/layout/Header.vue';
    import SidebarVue from '../components/layout/sidebar.vue';
    import { watch } from 'vue';

  import { error, success } from '@/js/toast';

  const props = defineProps(['errors']);
  watch(
    () => props.errors,
    (errors) => {
      if ('error' in errors) {
        error(errors.error);
      }
    }
  );
</script>


<style>
</style>

