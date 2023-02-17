<template>
  <div class="mb-5 text-center">
    <span class="back-btn border-danger text-danger" @click="goBack">
      <i class="fa fa-times"></i> Cancel
    </span>
  </div>

  <div class="row">
    <div class="col-md-5">
        <div class="px-3 mt-lg-5 mt-sm-2">
        <div class="">
          <h4>Instructions:</h4>
          <ul>
            <li>Fill out the form carefully.</li>
            <li>Enter your correct account details.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-7">
        <div>
          <FormGroup
            name="amount"
            placeholder="Enter Amount"
            v-model="bankForm.amount"
          />
          <FormGroup
            name="bank_name"
            placeholder="Bank Name"
            v-model="bankForm.bank_name"
          />
          <FormGroup
            name="bank_branch"
            placeholder="Bank Branch"
            v-model="bankForm.bank_branch"
          />
          <FormGroup
            name="account_name"
            placeholder="Account Name"
            v-model="bankForm.account_name"
          />
          <FormGroup
            name="account_number"
            placeholder="Account Number"
            v-model="bankForm.account_number"
          />
          <FormGroup
            name="routing_number"
            placeholder="Routing Number"
            v-model="bankForm.routing_number"
          />
          <FormGroup
            name="swift_code"
            placeholder="Swift Code"
            v-model="bankForm.swift_code"
          />
          <div class="d-flex justify-content-between">
              <FormButton
                :disabled="bankForm.processing"
                class="btn btn-outline-success w-100 mt-3"
                @button-clicked="validateBankWithdraw"
              >
                <ButtonLoader
                  text="Proceed <i class='fa fa-chevron-right'></i>"
                  :loading="bankForm.processing"
                ></ButtonLoader>
              </FormButton>
          </div>
        </div>
    </div>
  </div>
  <PasswordModal :open="openModal" @modal-close="handleModalClose" />

</template>

<script setup>
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
    import PasswordModal from './passwordModal.vue';


let openModal = ref(false);

  const emit = defineEmits(['goBack']);
  const goBack = () => {
    bankForm.reset();
    emit('goBack');
  };

  const bankForm = useForm({
    amount: '',
    bank_name: '',
    bank_branch: '',
    account_name: '',
    account_number: '',
    routing_number: '',
    swift_code: '',
    token: '',
  });

  const validateBankWithdraw = () => {
    bankForm.post(route('user.withdrawals.bank.validate'), {
        onSuccess: res => {
            if (res.props.data?.passed) {
                openModal.value = true
            }
        },
    });
  };


const handleModalClose = (response) => {
    openModal.value = false;
    if (response == 'valid')
    {
        console.log(response)
        bankWithdraw();
    }
  }

  const bankWithdraw = () => {
    bankForm.post(route('user.withdrawals.bank'));
  };
</script>
