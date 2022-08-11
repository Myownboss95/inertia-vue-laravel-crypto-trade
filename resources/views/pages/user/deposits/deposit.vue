<template>
  <Head title="Deposit" />
  <breadcrumb title="Deposit" :crumbs="['Dashboard', 'Deposits', 'Deposit']" />

  <div class="card radius-20 col-lg-7 mx-auto">
    <div class="card-body">
      <div class="row align-items-center py-3">
        <div class="col-md-5 border-end">
          <div class="row">
            <div
              class="col-6 text-center mt-2"
              v-for="(method, key) in props.payment_methods"
              :class="{ selected: form.method_id == method.id }"
              @click="selectMethod(method.id)"
            >
              <div class="border p-4 w-100">
                <h6>{{ method.name }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="px-3">
            <form v-if="!props.validated">
                <FormSelect
                  :disabled="form.method_id == ''"
                  class="mb-3"
                  name="pay_with"
                  label="Pay with"
                  :options="{ main: 'Main Balance', referral: 'Referral Balance' }"
                  v-model="form.pay_with"
                />
                <FormGroup
                  :disabled="form.method_id == ''"
                  name="amount"
                  placeholder="Amount"
                  label="Amount"
                  v-model="form.amount"
                />
                <FormButton
                  :disabled="form.method_id == ''"
                  class="btn btn-outline-primary"
                  @button-clicked="validate"
                >
                  <ButtonLoader text="Continue" :loading="form.processing" />
                </FormButton>
            </form>
            <div class="text-center" v-else>
                <div class="placeholder">
                    <img :src="`/storage/payment_methods/${method.image}`" alt="">
                </div>
                <p class="mt-3">Send equivalent of <strong>{{format_money(form.amount)}}</strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { ref, watch, computed,reactive } from 'vue';
import { error, info } from '@/js/toast';

const props = defineProps({
    payment_methods: Array,
    validated: {
        type: Boolean,
        default: false,
    },
    // data: Array,
});

  const form = useForm({
    method_id: '',
    amount: '',
    pay_with: 'main',
  });

const method = ref({});

const selectMethod = id => {
    if (!props.validated) {
        form.method_id = id
    } else {
        info('You cannot change method now. Refresh page.');
    }
}


watch(() => form.method_id, (newMethod) => {
    let m = props.payment_methods.filter((item, index) => item.id == newMethod);
    method.value = m[ 0 ];
})

const validate = () => {
    form.post(route('user.deposits.validate'));
  }
</script>

<style>
  .selected div {
    border-color: #5156be !important;
  }

  .placeholder{
    height:100px;
    width:100px;
  }
  .placeholder img{
    width:100%;
    height:100%;
  }
</style>
