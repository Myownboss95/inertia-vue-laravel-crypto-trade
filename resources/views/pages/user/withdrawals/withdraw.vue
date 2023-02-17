<template>
  <Head title="Withdraw" />
  <breadcrumb
    title="Withdraw"
    :crumbs="['Dashboard', 'Withdrawals', 'Withdraw']"
  />

  <div class="card shadow-lg radius-20 col-lg-7 mx-auto">
    <div class="card-body">
      <div
        class="row justify-content-center align-items-center py-3"
        style="min-height: 300px"
      >
        <div class="col-8 row" :class="{ 'd-none': withdrawalType != '' }">
          <div class="col-md-6" @click="setWithdrawalMethod('bank')">
            <div class="border p-4 w-100 text-center cursor-pointer">
              Bank Transfer
            </div>
          </div>

          <div class="col-md-6" @click="setWithdrawalMethod('crypto')">
            <div class="border p-4 w-100 text-center cursor-pointer">
              Crypto currency
            </div>
          </div>
        </div>

        <TokenRequest @continue-to="handleContinueTo" @go-back="goBack()" :continue-to="continueTo" v-if="withdrawalType == 'request_token'"  />
        <CryptoWithdrawal :require_token="props.crypto_require_token" @go-back="goBack()" :payment_methods="props.payment_methods" v-if="withdrawalType == 'crypto'" />
        <BankWithdrawal @go-back="goBack()" v-if="withdrawalType == 'bank'" />

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
  import Error from '@/views/components/alerts/error.vue';
  import { ref, watch, computed, reactive } from 'vue';
  import { info, error } from '@/js/toast';
import Modal from '@/views/components/modal.vue';
import CryptoWithdrawal from './crypto.vue';
import BankWithdrawal from './bank.vue';
import TokenRequest from './TokenRequest.vue';

  const props = defineProps({
    payment_methods: Array,
    flash: {
      type: Object,
      default: {},
    },
    validated: {
      type: Boolean,
      default: false,
    },
    data: {
      type: Object,
      default: {},
      },
      closeModal: {
          type: Boolean,
          default: false
      },
    crypto_require_token: Boolean
  });



  const method = ref({});
  let withdrawalType = ref('');
    let hasToken = ref(false);
let needsToken = ref(false);
    let continueTo = ref('bank')

const setWithdrawalMethod = (arg) => {
    if (props.crypto_require_token && arg == 'crypto' || arg == 'bank') {
        continueTo.value = arg;
        return withdrawalType.value = 'request_token';
    }
    return withdrawalType.value = arg;
}

const handleContinueTo = (value) =>  withdrawalType.value = value;

const goBack = () => {
    withdrawalType.value = '';
    hasToken.value = false;
    method.value = {};
  };

  const cancelBank = () => {
    bankForm.reset();
    hasToken.value = false;
  };



  const validate = () => {
    form.post(route('user.deposits.validate'));
  };


</script>

<style>
  .selected div {
    border-color: #5156be !important;
  }

  .placeholder {
    height: 100px;
    width: 100px;
  }
  .placeholder img {
    width: 100%;
    height: 100%;
  }

  .back-btn {
    cursor: pointer;
    border: 1px solid black;
    padding: 6px 10px;
    border-radius: 15px;
  }
  .back-btn:hover {
    border-color: crimson;
    color: crimson;
    transition: color 0.2s, border-color 0.2s;
  }
</style>
