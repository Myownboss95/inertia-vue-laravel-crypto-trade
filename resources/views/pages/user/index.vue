<template>
  <Head title="Dashboard" />
  <breadcrumb title="Dashboard" :crumbs="['Dashboard']" />
  <div class="row m-1">
    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow-lg radius-20">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-8">
              <span class="text-muted mb-3 lh-1 d-block text"
                >Main Balance</span
              >
              <h4 class="mb-3">
                <span class="counter-value" data-target="{{userMainBalance}}">
                  {{ format_money(userMainBalance) }}</span
                >
              </h4>
            </div>
            <div class="col-4">
              <i data-feather="shopping-bag" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-8">
              <span class="text-muted mb-3 lh-1 d-block"
                >Investment Balance</span
              >
              <h4 class="mb-3">
                <span
                  class="counter-value"
                  data-target="{{userInvestedBalance}}"
                >
                  {{ format_money(userInvestedBalance) }}</span
                >
              </h4>
            </div>
            <div class="col-4">
              <i data-feather="dollar-sign" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <span class="text-muted mb-3 lh-1 d-block">Total Profits</span>
              <h4 class="mb-3">
                <span class="counter-value" data-target="{userInvestedBalance}">
                  {{ format_money(trade_profits) }}
                </span>
              </h4>
            </div>
            <div class="col-6">
              <i data-feather="credit-card" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <span class="text-muted mb-3 lh-1 d-block">Active Trades</span>
              <h4 class="mb-3">
                <span class="counter-value" data-target="">
                  {{ activeTrades }}</span
                >
              </h4>
            </div>
            <div class="col-6">
              <i data-feather="package" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Section -->
  <div class="row m-1">
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Withdrawals</h4>
            <div v-if="withdrawals.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(withdrawal, key) in withdrawals" :key="key">
                      <td>{{ withdrawal.reference }}</td>
                      <td>{{ withdrawal.amount }}</td>
                      <td>{{ withdrawal.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(withdrawals_count) && withdrawals_count != 0
                  ? withdrawals_count - 6
                  : '0'
              }}
              more</span
            >
            <!-- <span class="ms-1 text-muted font-size-13"><inertia-link href="#" >View More</inertia-link></span> -->
          </div>
          <inertia-link
            :href="route('user.withdrawals.index')"
            class="btn btn-primary"
            >View Withdrawals<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>

    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Deposits</h4>
            <div v-if="deposits.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(deposit, key) in deposits" :key="key">
                      <td>{{ deposit.reference }}</td>
                      <td>{{ deposit.amount }}</td>
                      <td>{{ deposit.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(deposits_count) && deposits_count != 0
                  ? deposits_count - 6
                  : '0'
              }}
              more</span
            >
            <!-- <span class="ms-1 text-muted font-size-13"><inertia-link href="#" >View More</inertia-link></span> -->
          </div>
          <inertia-link
            :href="route('user.deposits.index')"
            class="btn btn-primary"
            >View Deposits<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Buy Trades</h4>
            <div v-if="buyTrades.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Stop Loss</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(buyTrade, key) in buyTrades" :key="key">
                      <td>{{ buyTrade.amount }}</td>
                      <td>{{ buyTrade.type }}</td>
                      <td>{{ buyTrade.stop_loss }}</td>
                      <td>{{ buyTrade.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(num_buyTrades) && num_buyTrades != 0
                  ? num_buyTrades - 6
                  : '0'
              }}
              more</span
            >
            <!-- <span class="ms-1 text-muted font-size-13"><inertia-link href="#" >View More</inertia-link></span> -->
          </div>
          <inertia-link
            :href="route('user.trades.index')"
            class="btn btn-primary"
            >View Trades<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Sell Trades</h4>
            <div v-if="sellTrades.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Stop Loss</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(sellTrade, key) in sellTrades" :key="key">
                      <td>{{ sellTrade.amount }}</td>
                      <td>{{ sellTrade.type }}</td>
                      <td>{{ sellTrade.stop_loss }}</td>
                      <td>{{ sellTrade.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(num_sellTrades) && num_sellTrades != 0
                  ? num_sellTrades - 6
                  : '0'
              }}
              more</span
            >
          </div>
          <inertia-link
            :href="route('user.trades.index')"
            class="btn btn-primary"
            >View Trades<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { Head } from '@inertiajs/inertia-vue3';
  import { computed, onMounted } from 'vue';
  import feather from 'feather-icons';

  const props = defineProps({
    userMainBalance: Number,
    userRefBalance: Number,
    userInvestedBalance: Number,
    withdrawals_count: Number,
    withdrawals: Object,
    deposits_count: Number,
    deposits: Object,
    num_buyTrades: Number,
    buyTrades: Object,
    num_sellTrades: Number,
    sellTrades: Object,
    trade_profits: Number,
    active_trades: Number,
  });
  onMounted(() => {
    feather.replace();
  });

  const userMainBalance = computed(() => props.userMainBalance);
  const userRefBalance = computed(() => props.userRefBalance);
  const userInvestedBalance = computed(() => props.userInvestedBalance);

  const withdrawals_count = computed(() => props.withdrawals_count);
  const withdrawals = computed(() => props.withdrawals);
  const deposits_count = computed(() => props.deposits_count);
  const deposits = computed(() => props.deposits);
  const num_buyTrades = computed(() => props.num_buyTrades);
  const buyTrades = computed(() => props.buyTrades);
  const num_sellTrades = computed(() => props.num_sellTrades);
  const sellTrades = computed(() => props.sellTrades);
  const trade_profits = computed(() => props.trade_profits);
  const activeTrades = computed(() => props.active_trades);
</script>


<style>
  .feather-50 {
    width: 50px;
    height: 50px;
  }
</style>
