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
                    <SidebarItem name="Users" :url="route('admin.users.index')" icon="users" v-if="$page.props.auth.user.is_admin" />
                    <li class="menu-title"> Transactions </li>
                    <SidebarItem name="Trades" :url="route('admin.trades.index')" icon="table" />
                    <SidebarItem name="Deposits" url="/" icon="credit-card" />
                    <SidebarItem name="Withdrawals" url="/" icon="dollar-sign" />
                    <li class="menu-title"> Settings </li>
                    <SidebarItem name="Password reset" :url="route('password.change')" icon="lock" />
                    <SidebarItem name="Two Factor Auth" :url="route('two-factor-auth')" icon="key" />
                    <SidebarItem name="Contact Details" :url="route('admin.settings.create')" icon="phone" v-if="$page.props.auth.user.is_admin" />
                    <SidebarItem name="Plans" :url="route('admin.plans.index')" icon="package" v-if="$page.props.auth.user.is_admin" />
                    <SidebarItem name="Tradeable assets" :url="route('admin.tradeables.index')" icon="gift" v-if="$page.props.auth.user.is_admin" />
                    <hr>
                    <SidebarItem name="Logout" method="post" :url="route('logout')" icon="power" />
                    <SidebarItem name="Home" :url="route('front.index')" icon="home" :raw="true" />
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
onMounted(_ => {
    new MetisMenu('#side-menu');
    feather.replace();
});
</script>

<style>

</style>
