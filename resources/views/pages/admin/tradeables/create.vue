<template>
  <Head title="Create Plan" />
  <breadcrumb
    title="Create Plan"
    :crumbs="['Dashboard', 'Settings', 'Tradeable assets', 'Create']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createPlan">
          <FormGroup
            name="name"
            placeholder="Asset name"
            label="Asset name"
            v-model="form.name"
          />


          <FormSelect
            id="demo"
            name="demo"
            label="Demo Plan"
            :options="{ 'crypto': 'Crypto Currency', 'commodity': 'Commodity', 'currency':'Currency' }"
            v-model="form.demo"
          />
          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Plan" :loading="form.processing" />
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
  import InputGroup from '@/views/components/form/InputGroup.vue';
import { error } from '@/js/toast';

  const form = useForm({
    name: '',
    tenure: '',
    min_investment: '',
      max_investment: '',
    bonus:'',
    demo: 0,
    features: [],
  });

  const addFeature = () => form.features.push('');

  const removeFeature = (key) =>
    (form.features = form.features.filter((item, k) => form.features[key] != k));

    const createPlan = (_) => {
        if (!form.features.length) return error('At least a plan feature is required');
        form.post(route('admin.plans.store'));
  };
</script>

<style>
</style>
