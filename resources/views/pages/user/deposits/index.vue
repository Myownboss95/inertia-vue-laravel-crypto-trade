<template>
  <Head title="Deposits" />
  <breadcrumb title="Deposits" :crumbs="['Dashboard', 'Deposits']" />
  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="deposits.length">
                  <tr v-for="(deposit, key) in deposits" :key="key">
                      <td>{{deposit.reference}}</td>
                      <td>{{format_money(deposit.amount)}}</td>
                      <td>{{deposit.status}}</td>
                      <td>{{new Date(deposit.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.deposits.edit',deposit.id)" class="btn btn-outline-primary btn-sm">
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
                    <td colspan="10" class="text-muted text-center">No deposits found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="deposits.length">
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
    deposits: Object,
})
const deposits = computed(() => props.deposits.data);
const links = computed(() => props.deposits.links);


</script>

<style>

</style>
