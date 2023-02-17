<template>
    <div class="mb-4 text-center">
      <span class="back-btn border-danger text-danger" @click="emit('goBack')">
        <i class="fa fa-times"></i> Cancel
      </span>
    </div>

    <div class="row mt-3">
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
          </div>
        </div>
      </div>
      <div class="col-md-6 border-start">
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
              name="account"
              :options="{
                main: 'Main Balance',
                // referral: 'Referral Balance',
              }"
              v-model="form.account"
            ></FormSelect>

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
              @button-clicked="handleWithdraw"
            >
              <ButtonLoader
                text="Withdraw"
                :loading="form.processing"
              ></ButtonLoader>
            </FormButton>
          </div>
        </div>
      </div>
    </div>
    <PasswordModal :open="openModal" @modal-close="handleModalClose" />
</template>

<script setup>
import ButtonLoader from "@/views/components/form/ButtonLoader.vue";
import FormButton from "@/views/components/form/FormButton.vue";
import FormSelect from '@/views/components/form/FormSelect.vue';
import FormGroup from "@/views/components/form/FormGroup.vue";
import { useForm } from '@inertiajs/inertia-vue3';
import { computed, ref } from "vue";
import PasswordModal from "./passwordModal.vue";

const props = defineProps({
    payment_methods: Array,
    require_token: Boolean
})

let openModal = ref(false);


const emit = defineEmits([ 'goBack' ]);

const goBack = () => {
    bankForm.reset();
    emit('goBack');
}

const handleModalClose = (response) => {
    openModal.value = false;
    if (response == 'valid')
    {
        withdraw();
    }
}

const form = useForm({
    method_id: '',
    amount: '',
    account: 'main',
    address: '',
    validate: '',
  });

const selectMethod = (id) => (form.method_id = id);
const disableElements = computed(() => form.method_id == '');

const withdraw = () => {
    form.post(route('user.withdrawals.store'));
};

const validateWithdrawal = () => {
    form.validate = true;
    form.post(route('user.withdrawals.store'), {
        preserveState: true,
        onSuccess: (res) => {
            if (res.props.data.valid) {
                form.validate = '';
                openModal.value = true;
            }
        }
    });
}

const handleWithdraw = () => {
    if (props.require_token) {
        validateWithdrawal();
        return;
    }
    withdraw();
}

</script>
