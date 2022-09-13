<template>
  <Head title="Withdraw" />
  <breadcrumb
    title="Withdraw"
    :crumbs="['Dashboard', 'Withdrawals', 'Withdraw']"
  />

  <div class="card shadow-lg radius-20 col-lg-7 mx-auto">
    <div class="card-body">
      <div class="row justify-content-center align-items-center py-3" style="min-height: 300px">
          <div class="col-8 row" :class="{'d-none': withdrawalType != ''}">
              <div class="col-6" @click="withdrawalType = 'bank'">
                  <div class="border p-4 w-100 text-center cursor-pointer">
                      Bank Transfer
                  </div>
              </div>

              <div class="col-6" @click="withdrawalType = 'crypto'">
                  <div class="border p-4 w-100 text-center cursor-pointer">
                      Crypto currency
                  </div>
              </div>
          </div>

          <div :class="{'d-none': withdrawalType != 'crypto'}">
            <div class="mb-3" @click="withdrawalType = ''">
                <span class="back-btn">
                    <i class="fa fa-arrow-left"></i> Back
                </span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="px-3">
                        <div class="">
                            <h4>Instructions:</h4>
                            <ul>
                                <li>Select a withdraw method.</li>
                                <li>Enter amount you want.</li>
                                <li>
                                    Enter your wallet address. Make sure your address type is the
                                    same as the deposit method.
                                </li>
                                <li>Click on withdraw.</li>
                            </ul>
                            <p>
                                <i
                                >Please note, withdrawals take upto 3 hours during week days
                                    to be processed.</i
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-start ">
                    <div class="row">
                        <div
                            class="col-6 text-center my-2"
                            v-for="(method, key) in props.payment_methods"
                            :class="{ selected: form.method_id == method.id }"
                            @click="selectMethod(method.id)"
                        >
                            <div class="border p-4 w-100">
                                <h6>{{ method.name }}</h6>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr />

                            <FormSelect
                                :disabled="disableElements"
                                class="my-3"
                                name="amount"
                                :options="{
                    main: 'Main Balance',
                    referral: 'Referral Balance',
                  }"
                                v-model="form.account"></FormSelect>

                            <FormGroup
                                :disabled="disableElements"
                                name="amount"
                                placeholder="Amount"
                                v-model="form.amount"
                                class="mt-2"
                            ></FormGroup>

                            <FormGroup
                                :disabled="disableElements"
                                name="address"
                                placeholder="Wallet Address"
                                v-model="form.address"
                            ></FormGroup>

                            <FormButton
                                :disabled="disableElements"
                                class="btn btn-outline-primary w-100"
                                @button-clicked="withdraw"
                            >
                                <ButtonLoader text="Withdraw" :loading="form.processing"></ButtonLoader>

                            </FormButton>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div :class="{'d-none': withdrawalType != 'bank'}">
            <div class="mb-3" @click="withdrawalType = ''">
                <span class="back-btn">
                    <i class="fa fa-arrow-left"></i> Back
                </span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="px-3">
                        <div class="">
                            <h4>Instructions:</h4>
                            <ul>
                                <li>Enter amount you want.</li>
                                <li>
                                    Carefully fill the tranfer information.
                                </li>
                                <li>Click on withdraw.</li>
                            </ul>
                            <p>
                                <i
                                >Please note, bank withdrawals take upto 7 working days
                                    to reflect in your bank account.</i
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-start ">
                    <FormGroup name="amount" placeholder="Enter Amount" v-model="bankForm.amount" />
                    <FormGroup name="bank_name" placeholder="Bank Name" v-model="bankForm.bank_name" />
                    <FormGroup name="bank_branch" placeholder="Bank Branch" v-model="bankForm.bank_branch" />
                    <FormGroup name="account_name" placeholder="Account Name" v-model="bankForm.account_name" />
                    <FormGroup name="account_number" placeholder="Account Number" v-model="bankForm.account_number" />
                    <FormGroup name="routing_number" placeholder="Routing Number" v-model="bankForm.routing_number" />
                    <FormGroup name="swift" placeholder="Swift Code" v-model="bankForm.swift_code" />
                    <FormButton
                                :disabled="bankForm.processing"
                                class="btn btn-outline-primary w-100"
                                @button-clicked="bankWithdraw"
                            >
                                <ButtonLoader text="Withdraw" :loading="bankForm.processing"></ButtonLoader>

                            </FormButton>
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
  import Error from '@/views/components/alerts/error.vue';
  import { ref, watch, computed, reactive } from 'vue';
  import { info,error } from '@/js/toast';

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
  });

const bankForm = useForm({
    amount: '',
    bank_name: '',
    bank_branch: '',
    account_name: '',
    account_number: '',
    routing_number: '',
    swift_code: ''
});

  const form = useForm({
    method_id: '',
    amount: '',
    account: 'main',
    address: '',
  });

  const method = ref({});
  let withdrawalType = ref('');

  const selectMethod = id => form.method_id = id;


  // watch(
  //   () => props.flash,
  //   (flash) => {
  //       if ('error' in flash && flash.error != '') {
  //           error(flash.error);
  //       }
  //       console.log(flash.error);
  //   }
  // );

  const disableElements = computed(() => form.method_id == '');

  const validate = () => {
    form.post(route('user.deposits.validate'));
  };

  const withdraw = () => {
    form.post(route('user.withdrawals.store'));
  };

const bankWithdraw = () => {
    bankForm.post(route('user.withdrawals.bank'));
  }
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

  .back-btn{
    cursor:pointer;
    border: 1px solid black;
    padding: 6px 10px;
    border-radius: 15px;
  }
  .back-btn:hover{
    border-color: crimson;
    color: crimson;
    transition: color .2s, border-color .2s;
  }
</style>
