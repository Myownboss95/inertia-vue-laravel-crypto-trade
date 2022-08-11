<template>
  <Head title="Trades" />
  <breadcrumb title="Trades" :crumbs="['Dashboard', 'Trades']" />
  <div class="row p-3 m-1">
    <div class="card shadow col-md-4 col-sm-12 ">
    <div class="card-body">
      <!-- Trading view widget -->
      <form>
          <FormGroup
            name="amount"
            placeholder="Enter Amount"
            label="Amount"
            v-model="form.amount"
          />

        <FormSelect
            id="tradeable_type"
            name="tradeable_type"
            label="Demo Plan"
            :options="{ 'crypto': 'Crypto Currency', 'commodity': 'Commodity', 'currency':'Currency' }"
            v-model="form.tradeable_type"
          />

          <FormSelect
            id="asset"
            name="tradeable_id"
            label="Demo Plan"
            :options="assets"
            v-model="form.type"
          />

          <FormSelect
            id="demo"
            name="stoploss"
            label="Stop Loss"
            :options="{ 5: '5%', 15: '15%', 25: '25%', 35: '35%', 50: '50%' }"
            v-model="form.stoploss"
          />

          
          <div class="d-flex justify-content-between">
          <FormButton
            type="button"
            class="w-100 btn btn-success mt-3 m-1"
            :disabled="form.processing"
            @button-clicked="placeTrade('buy')"
          >
            <ButtonLoader text="Buy" :loading="form.processing" />
          </FormButton>
          <FormButton
            type="button"
            class="w-100 btn btn-danger mt-3 m-1"
            :disabled="form.processing"
            @button-clicked="placeTrade('sell')"
          >
            <ButtonLoader text="Sell" :loading="form.processing" />
          </FormButton>
          </div>
        </form>
     
    </div>
  </div>
  <div class="card shadow col-md-8 col-sm-12">
    <div class="card-body">
      <!-- Trading view widget -->
      <Chart :options="{theme: 'light',autosize: true,}" style="height:400px; width:100%"/>
    </div>
  </div>
  </div>
</template>

<script setup>
import { computed, ref, watch } from "vue";
import { useForm } from '@inertiajs/inertia-vue3';
import FormGroup from '@/views/components/form/FormGroup.vue';
import FormSelect from '@/views/components/form/FormSelect.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { error } from "@/js/toast";
import axios from "axios";

import { Chart } from 'vue-tradingview-widgets'

const assets = ref(null);

const props = defineProps({
  trades: Object,
});
const trades = computed(() => props.trades.data);
const links = computed(() => props.trades.links);

const form = useForm({
    name: '',
    type: '',
    tradeable_type: '',
  });

  watch(()=>form.tradeable_type, (type) => {
    if(type != ''){
        // console.log(type)
        axios.get(route('admin.trades.getTradeables',{type}))
        .then(res => {
            if(res.status != 200) throw Error()
            assets.value = res.data.data;
            // console.log(res.data)
            
        })
        .catch(err => {
            error('Failed to load assets, refresh page.');
        })
    }
  })

    const placeTrade = (type) => {
        form.type = type;
      console.log(form.data())
        form.post(route('admin.tradeables.store'));
  };


</script>

<style>
</style>
