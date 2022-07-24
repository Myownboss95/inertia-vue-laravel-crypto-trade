<template>
  <div>
    <div class="input-group auth-pass-inputgroup">
      <input-vue
        :type="type"
        :id="id"
        :name="name"
        :placeholder="placeholder"
        :modelValue="modelValue"
        @update:model-value="(value) => $emit('update:modelValue',value)"
      />
      <ButtonVue
        class="btn btn-light shadow-none ms-0"
        type="button"
        @button-clicked="() => $emit('buttonClicked')"
      >
        <span v-show="text != 'undefined' || text.length">
          {{ text }}
        </span>
        <i class="mdi" :class="icon" v-show="icon"></i>
      </ButtonVue>
    </div>
    <ErrorVue :name="name" />
  </div>
</template>

<script setup>
  import ErrorVue from '@/views/components/alerts/error.vue';
  import InputVue from '@/views/components/form/FormInput.vue';
  import ButtonVue from '@/views/components/form/FormButton.vue';

defineProps({
    type: {
        type: String,
    },
    name: {
        type:String,
    },
    text: {
        type:String
    },
    icon: {
        type: String
    },
    placeholder: {
        type:String,
        default:'Enter Password'
    },
    modelValue:null
});

  defineEmits(['update:modelValue', 'buttonClicked']);
</script>

<style>
</style>
