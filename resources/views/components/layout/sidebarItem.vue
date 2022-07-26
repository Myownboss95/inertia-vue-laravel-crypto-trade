<template>
  <li>
    <inertia-link class="a-button" :as="method ? 'button' : 'a'" :method="method" :href="children.length ? `javascript: void(0);` : url" :class="{ 'has-arrow': children.length}">
        <i :data-feather="icon"></i>
        <span data-key="t-authentication">{{name}}</span>
    </inertia-link>
    <ul class="sub-menu" aria-expanded="false" v-if="children.length">
        <li v-for="(child, index) in children" :key="index">
            <inertia-link class="a-button" :method="method" :as="method ? 'button' : 'a'" :href="child.url" data-key="t-login" v-text="child.name"></inertia-link>
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
}
</script>

<style>

</style>
