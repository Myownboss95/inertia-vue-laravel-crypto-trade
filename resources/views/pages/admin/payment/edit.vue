<template>
  <Head title="Edit Payment Method" />
  <breadcrumb
    title="Edit Payment Method"
    :crumbs="['Dashboard', 'Settings', 'Payment Method', 'Edit']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="updatePayment">
          <FormGroup
            name="name"
            placeholder="Asset name"
            label="Asset name"
            v-model="form.name"
          />


          <FormSelect
            id="demo"
            name="status"
            label="Demo Plan"
            :options="{ '1': 'Enable', '0': 'Disable' }"
            v-model="form.status"
          />
          <div class="form-group" v-if="form.image">
              <img :src='photo' class="img-fluid p-5"/>
          </div>
          <div class="form-group" v-else>
              <h2>No Image Uploaded Yet</h2>
          </div>

          <div class="mt-3 mb-3">
          <label >File Upload</label>
          <input class="form-control" type="file" @input="form.image = $event.target.files[0]" />
          </div>

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Update Payment Method" :loading="form.processing" />
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
  import {ref, watch} from 'vue'
import { error } from '@/js/toast';

const props = defineProps(['payment']);
  const form = useForm({
    name: props.payment?.name,
    status: props.payment?.status ,
    image:'',
  });

  let photo = ref(null);

  watch(()=> form.image, (newPhoto) => {
    if(newPhoto != undefined || newPhoto !='' ){
      photo.value= URL.createObjectURL(newPhoto)
    }
  })



    const updatePayment = () => {
        form.put(route('admin.payment-method.update', props.payment.id));
  };
</script>

<style>
</style>
