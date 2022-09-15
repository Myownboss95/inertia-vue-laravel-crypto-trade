<template>
  <Head title="Create Payment Method"/>
  <breadcrumb
    title="Create Payment Method"
    :crumbs="['Dashboard', 'Settings', 'Create Payment Method', 'Create']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createPaymentPlan">
          <FormGroup
            name="name"
            placeholder="Payment Method Name"
            label="Payment Method Name"
            v-model="form.name"
          />
          <FormSelect
            id="demo"
            name="type"
            label="Demo Plan"
            :options="{ 1: 'Enable', 0: 'Disable' }"
            v-model="form.status"
          />

          <FormGroup
            name="wallet"
            placeholder="Wallet Address"
            label="Wallet Address"
            v-model="form.wallet"
            class="mt-3"
          />

          <div class="mt-3 mb-3">
          <label >File Upload</label>
          <input class="form-control" type="file" @input="form.image = $event.target.files[0]" />
          </div>

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Payment Method" :loading="form.processing" />
          </FormButton>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';

  const form = useForm({
    name: '',
    status: 1,
    image: '',
    wallet:'',
  });


    const createPaymentPlan = () => {
        form.post(route('admin.payment-method.store'));
  };
</script>

<style>
</style>
