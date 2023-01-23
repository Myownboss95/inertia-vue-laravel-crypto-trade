<template>
  <Head title="Withdrawals" />
  <breadcrumb title="Withdrawals" :crumbs="['Dashboard', 'Withdrawals']" />
  <div class="card shadow-lg radius-20 col-lg-10 mx-auto">
    <div class="card-body">
        <div class="text-end">
            <inertia-link :href="route('admin.withdrawals.token-requests')" class="btn btn-outline-primary">
                Token Requests
            </inertia-link>
        </div>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="withdrawals.length">
                  <tr v-for="(withdrawal, key) in withdrawals" :key="key">
                      <td>{{withdrawal?.user?.first_name}}</td>
                      <td>{{withdrawal.reference}}</td>
                      <td>{{format_money(withdrawal.amount)}}</td>
                      <td>{{withdrawal.status}}</td>
                      <td>{{new Date(withdrawal.created_at).toDateString()}}</td>
                      <td>
                        <span @click="show(withdrawal.id)" class="btn btn-outline-primary btn-sm cursor-pointer me-2">
                              <i class="fa fa-eye"></i>
                          </span>

                          <span @click="approve(withdrawal.id)" v-if="withdrawal.status == 'pending'" class="btn btn-outline-success btn-sm cursor-pointer me-2">
                              <i class="fa fa-check"></i>
                          </span>

                          <span @click="decline(withdrawal.id)" v-if="withdrawal.status == 'pending'" class="btn btn-outline-danger btn-sm cursor-pointer">
                              <i class="fa fa-times"></i>
                          </span>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="10" class="text-muted text-center">No withdrawals found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="withdrawals.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
  <div v-if="withdrawal">
      <Modal :title="'Transaction Details  (' + withdrawal?.reference + ')'" :open="modalState" @modal-closed="closeModal">
        <div class="modal-body">
            <div v-if="withdrawal" class="row">
                <FormGroup label="User" :model-value="`${withdrawal?.user?.first_name} ${withdrawal?.user?.last_name}`" disabled />
                <FormGroup label="Amount" :model-value="`${withdrawal?.amount}`" disabled />
                <FormGroup label="Amount" :model-value="`${withdrawal?.status}`" disabled />
                <FormGroup label="Payment Method" :model-value="getPaymentMethod(withdrawal)" disabled />
                <FormGroup v-if="withdrawal?.options?.bank_name" label="Bank Name" :model-value="`${withdrawal?.options?.bank_name}`" disabled />
                <FormGroup v-if="withdrawal?.options?.account_number" label="Account Number" :model-value="`${withdrawal?.options?.account_number}`" disabled />
                <FormGroup v-if="withdrawal?.options?.address" label="Amount" :model-value="`${withdrawal?.options?.address}`" disabled />
            </div>
        </div>
      </Modal>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed, ref } from 'vue';
import Paginator from '@/views/components/paginator.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Modal from '@/views/components/modal.vue';
import FormGroup from '@/views/components/form/FormGroup.vue';

const modalState = ref(false);
const props = defineProps({
    withdrawals: Object,
    payment_methods: Object
})

console.log(props.payment_methods)
const withdrawals = computed(() => props.withdrawals.data);
const links = computed(() => props.withdrawals.links);

let withdrawal = ref({})
const form = useForm({});

const getPaymentMethod = data => {
    if (data.hasOwnProperty('options')) {
        if (data.options.hasOwnProperty('method')) {
            return data.options.method;
        }

        if (data.options.hasOwnProperty('payment_method_id')) {
            let method = props.payment_methods.filter(m => m.id == data.options.payment_method_id)[0];
            if (method.hasOwnProperty('name')) {
                return method.name;
            }
        }
    }

    // if (data.options.hasOwnProperty('method')) {
    //     return data.method
    // }
    // let method = props.payment_methods.filter(m => m.id == data.payment_id);

    // console.log(method);
}

const show = id => {
    withdrawal.value = withdrawals.value.filter((w) => w.id == id)[ 0 ]
    modalState.value = true;
}

const closeModal = () => {
    modalState.value = false;
}

const approve = id => {
    form.post(route('admin.withdrawals.approve', id), {
        onBefore: () => confirm('Are you sure you want approve this withdrawal?'),
    })
}

const decline = id => {
    form.post(route('admin.withdrawals.decline', id), {
        onBefore: () => confirm('Are you sure you want decline this withdrawal?'),
    })
}


</script>

<style>

</style>
