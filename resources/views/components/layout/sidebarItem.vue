<template>
  <li>
    <inertia-link
      class="a-button"
      :as="method ? 'button' : 'a'"
      :method="method"
      :href="children.length ? `javascript: void(0);` : url"
      :class="{ 'has-arrow': children.length }"
      :replace="url === route('logout')"
    >
      <i :data-feather="icon"></i>
      <span>{{ name }}</span>
    </inertia-link>
    <ul class="sub-menu" aria-expanded="false" v-if="children.length">
      <li v-for="(child, index) in children" :key="index">
        <inertia-link
          class="a-button"
          :method="method"
          :as="method ? 'button' : 'a'"
          :href="child.url"
          :replace="url === route('logout')"
        >
          <span v-text="child.name"></span>
        </inertia-link>
      </li>
    </ul>
  </li>
</template>

<script>
  export default {
    name: 'SidebarItem',
    props: {
      icon: String,
      url: String,
      name: String,
      children: {
        type: Array,
        default: [],
      },
      method: null,
    },
  };
</script>

<style>
</style>
