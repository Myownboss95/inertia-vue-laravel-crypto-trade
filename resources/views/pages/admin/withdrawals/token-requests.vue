<template>
  <Head title="Token Requests" />
  <breadcrumb title="Token Requests" :crumbs="['Dashboard', 'Withdrawals','Token Requests']" />
  <div class="card shadow-lg radius-20 col-lg-6 mx-auto">
    <div class="card-body">
        <InertiaLink :href="route('admin.withdrawals.index')" class="mb-3 ms-2 fw-bolder">
                <i class="fa fa-arrow-left"></i>
                 Back
            </InertiaLink>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="requests.length">
                  <tr v-for="(request, key) in requests" :key="key">
                      <td>{{request?.user?.first_name}}</td>
                      <td>{{request?.status}}</td>
                      <td>{{new Date(request?.created_at).toDateString()}}</td>
                      <td>
                          <span @click="generateToken(request.id)" class="btn btn-outline-success btn-sm cursor-pointer me-2">
                              <i class="fa fa-check"></i>
                              Generate Token
                          </span>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="10" class="text-muted text-center">No requests found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="requests.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    requests: Object,
})
const requests = computed(() => props.requests.data);
const links = computed(() => props.requests.links);

const form = useForm({});

const generateToken = id => {
    form.post(route('admin.withdrawals.token-requests.generate', id), {
        onBefore: () => confirm('Are you sure you want generate token?'),
    })
}


</script>

<style>

</style>
