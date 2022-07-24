<template>
  <li>
    <inertia-link :method="method" :href="children.length ? `javascript: void(0);` : url" :class="{ 'has-arrow': children.length}">
        <i :data-feather="icon"></i>
        <span data-key="t-authentication">{{name}}</span>
    </inertia-link>
    <ul class="sub-menu" aria-expanded="false" v-if="children.length">
        <li v-for="(child, index) in children" :key="index">
            <inertia-link :method="method" :href="child.url" data-key="t-login" v-text="child.name"></inertia-link>
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
