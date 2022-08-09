<template>
  <Head title="Withdrawals" />
  <breadcrumb title="Withdrawals" :crumbs="['Dashboard', 'Withdrawals']" />
  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="withdrawals.length">
                  <tr v-for="(withdrawal, key) in withdrawals" :key="key">
                      <td>{{withdrawal.user.first_name}}</td>
                      <td>{{withdrawal.reference}}</td>
                      <td>{{format_money(withdrawal.amount)}}</td>
                      <td>{{withdrawal.status}}</td>
                      <td>{{withdrawal.status}}</td>
                      <td>{{new Date(withdrawal.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.withdrawals.edit',withdrawal.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-edit"></i>
                          </InertiaLink>

                          <!-- <InertiaLink method="delete" :href="route('admin.plans.destroy',plan.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink> -->
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
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';

const props = defineProps({
    withdrawals: Object,
})
const withdrawals = computed(() => props.withdrawals.data);
const links = computed(() => props.withdrawals.links);


</script>

<style>

</style>
