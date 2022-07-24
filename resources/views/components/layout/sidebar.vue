<template>
<!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title"> Menu </li>
                    <SidebarItem name="Dashboard" :url="route('user.index')" icon="layers" />
                    <SidebarItem name="Users" url="/" icon="users" />
                    <li class="menu-title"> Transactions </li>
                    <SidebarItem name="Trades" url="/" icon="table" />
                    <SidebarItem name="Deposits" url="/" icon="credit-card" />
                    <SidebarItem name="Withdrawals" url="/" icon="dollar-sign" />
                    <li class="menu-title"> Settings </li>
                    <SidebarItem name="Password reset" url="/" icon="lock" />
                    <SidebarItem name="Two Factor Auth" url="/" icon="key" />
                    <SidebarItem name="Contact Details" url="/" icon="phone" />
                    <SidebarItem name="Plans" url="/" icon="package" />
                    <hr>
                    <SidebarItem name="Logout" method="post" :url="route('logout')" icon="power" />
                    <SidebarItem name="Home" :url="route('front.index')" icon="home" />
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
<!-- Left Sidebar End -->
</template>

<script setup>
import { onMounted } from 'vue';
import feather from 'feather-icons';
import MetisMenu from 'metismenujs';
import SidebarItem from './sidebarItem.vue';
import { usePage } from '@inertiajs/inertia-vue3'
import route from 'ziggy-js'
onMounted(_ => {
    new MetisMenu('#side-menu');
    feather.replace();
});
</script>

<style>

</style>
