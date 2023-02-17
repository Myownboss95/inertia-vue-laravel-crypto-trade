<template>
  <Modal
    title="Verify Action"
    id="verifyPasswordModal"
    :open="props.open"
    @modal-closed="closeModal()"
  >
    <div class="modal-body">
      <div class="px-5 py-3">
        <p class="mb-3">Enter withdrawal token to complete transaction.</p>
        <FormGroup
          name="token"
          placeholder="Enter Token"
          v-model="form.token"
        />
        <FormButton
          :disabled="form.processing"
          class="btn btn-outline-success w-100 mt-2"
          @button-clicked="validateToken"
        >
          <ButtonLoader
            text="Send Request"
            :loading="form.processing"
          ></ButtonLoader>
        </FormButton>
      </div>
    </div>
  </Modal>
</template>

<script setup>
import FormGroup from "@/views/components/form/FormGroup.vue";
import FormButton from "@/views/components/form/FormButton.vue";
import ButtonLoader from "@/views/components/form/ButtonLoader.vue";
import Modal from "@/views/components/modal.vue";
import { ref } from 'vue';
import { useForm } from "@inertiajs/inertia-vue3";


const props = defineProps({
    open: {
        type: Boolean,
        value: false
    }
})

const emit = defineEmits(['modalClose']);
const closeModal = () => {
    emit('modalClose');
}

const form = useForm({
    token: ''
})

const validateToken = () => {
    form.post(route('user.withdrawals.validate-token'), {
        preserveState: true,
        onSuccess: res => {
            if (res.props.data.valid) {
                emit('modalClose', 'valid');
                document.querySelectorAll('.btn-close').forEach(element => {
                    element.click();
                });
            }
        }
    })
}

</script>

<style>

</style>
