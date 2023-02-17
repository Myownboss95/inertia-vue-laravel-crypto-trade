<template>
    <div class="mb-3">
        <span class="back-btn" @click="goBack">
        <i class="fa fa-arrow-left"></i> Back
        </span>
    </div>
    <div class="row">
    <div class="col-md-6">
      <div class="px-3">
        <div class="">
          <h4>Instructions:</h4>
          <ul>
            <li>Request for a withdrawal token.</li>
            <li>Enter your passaword to confirm request.</li>
            <li>Token will be sent to your email.</li>
          </ul>
          <p>
            <i
              >Please note, bank withdrawals take upto 5 hours to reflect in
              your bank account.</i
            >
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 border-start">
      <div class="w-100">
        <FormButton
          class="btn btn-outline-info d-block mx-auto"
          @button-clicked="verifyModalState = true"
        >
          <ButtonLoader text="Request Withdrawal Token" />
        </FormButton>

        <p class="text-center mt-3">
          If you have received a token, click the button below to initiate
          withdrawal request.
        </p>

        <FormButton
          class="btn btn-outline-success d-block mx-auto"
          @button-clicked="continueTo()"
        >
          <ButtonLoader text="Proceed to withdraw" />
        </FormButton>
      </div>
    </div>
  </div>
   <Modal
    title="Verify Action"
    id="verifyPasswordModal"
    :open="verifyModalState"
    @modal-closed="verifyModalState = false"
  >
    <div class="modal-body">
      <div class="px-5 py-3">
        <p class="mb-3">Enter your password to continue.</p>
        <FormGroup
          name="password"
          placeholder="Enter Password"
          type="password"
          v-model="requestTokenForm.password"
        />
        <FormButton
          :disabled="requestTokenForm.processing"
          class="btn btn-outline-success w-100 mt-2"
          @button-clicked="requestToken"
        >
          <ButtonLoader
            text="Send Request"
            :loading="requestTokenForm.processing"
          ></ButtonLoader>
        </FormButton>
      </div>
    </div>
  </Modal>
</template>

<script setup>
import FormButton from "@/views/components/form/FormButton.vue";
import ButtonLoader from "@/views/components/form/ButtonLoader.vue";
import FormGroup from '@/views/components/form/FormGroup.vue';
import Modal from "@/views/components/modal.vue";
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const props = defineProps({
    continueTo: {
        type: String,
        value: 'bank',
    }
})



let verifyModalState = ref(false);

const requestTokenForm = useForm({
    password: '',
})

const emit = defineEmits([ 'goBack', 'continueTo' ]);

const goBack = () => {
    emit('goBack');
};

const continueTo = () => {
    emit('continueTo', props.continueTo);
}

const requestToken = () => {
    requestTokenForm.post(route('user.withdrawals.request-token'), {
        preserveState: true,
        onSuccess: () => {
            requestTokenForm.reset();
            verifyModalState.value = false;
            if ( usePage().props.value?.data?.closeModal) {
                document.querySelectorAll('.btn-close').forEach(element => {
                    element.click();
                });
            }
        }
    });
}
</script>
