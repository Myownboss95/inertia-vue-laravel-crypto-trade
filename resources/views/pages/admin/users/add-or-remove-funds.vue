<template>
  <Head title="Add or Remove funds" />
  <Breadcrumb
    title="Add or Remove funds"
    :crumbs="['Dashboard', 'Users', 'Add/Remove Funds']"
  />

  <div class="col-md-4 mx-auto">
    <div class="card shadow-lg radius-20">
      <div class="card-body">
        <div class="text-start my-4">
            <InertiaLink :href="route('admin.users.index')" class="ms-3 fw-bolder">
                <i class="fa fa-arrow-left"></i>
                 Back
            </InertiaLink>
        </div>
        <form class="px-3 pb-5" @submit.prevent="submitForm">
          <FormGroup
           :disabled="true"
            class="mb-3"
            name="amount"
            v-model="current_balance"
          />

          <FormSelect
            class="mb-3"
            name="action"
            :options="{ 1: 'Add Funds', 0: 'Deduct Funds' }"
            v-model="action"
          />

          <FormGroup
            class="mb-3"
            name="amount"
            placeholder="Amount"
            v-model="form.amount"
          />

          <FormButton
          type="submit"
            class="btn w-100"
            :class="{
              'btn-outline-success': action == 1,
              'btn-outline-danger': action == 0,
            }"
          >
            <ButtonLoader
              :text="action == 0 ? 'Deduct funds' : 'Add funds'"
              :loading="form.processing"
            ></ButtonLoader>
          </FormButton>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import Breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
import { format_money } from '@/scripts/mixins/money';
import {computed, ref} from 'vue'

  const props = defineProps({
    current_balance: {
      type: Number,
      default: 0,
    },
  });

const current_balance = computed(() => 'Current Bal: ' + format_money.methods.format_money(props.current_balance))
const action = ref(0);

  const form = useForm({
    amount: '',
  });

const submitForm = () => {
    let r = `admin.users.${ action.value == 1 ? 'add-funds' : 'deduct-funds' }`;
    console.log(r);
    form.post(route(r, route().params.user), {
        onBefore: () => confirm(`Are you sure you want to ${ action.value == 1 ? 'add funds to' : 'deduct funds from' } user?`),
        onSuccess: () => form.reset()
    })
  }
</script>

<style>
</style>
