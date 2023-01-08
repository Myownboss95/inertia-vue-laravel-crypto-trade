import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { importPageComponent } from '@/scripts/vite/import-page-component'
import { InertiaProgress } from '@inertiajs/progress'
import { createPinia } from 'pinia';
import route from 'ziggy-js'
import * as Sentry from '@sentry/vue';

const pinia = createPinia();


import "@/assets/css/preloader.css"
import "@/assets/css/bootstrap.css"
import "@/assets/css/icons.css"
import "@/assets/css/app.css"

import "bootstrap"
import 'simplebar';
import 'simplebar/dist/simplebar.css'

import 'izitoast/dist/css/iziToast.css'

import { translations } from './mixins/translations';
import { format_money } from './mixins/money';

import AuthVue from '@/views/layouts/auth.vue';
import DefaultVue from '@/views/layouts/default.vue';

// import vGoogleTranslate from "v-google-translate";

createInertiaApp({
    title: title => `${ title } - ${ import.meta.env.VITE_APP_NAME }`,
    resolve: async (name) => {
        const { default: page } = await importPageComponent(name, import.meta.glob('../views/pages/**/*.vue'))
        if (name.startsWith('auth.')) {
            page.layout = AuthVue;
        } else {
            page.layout = DefaultVue;
        }
        return page;
    },
    setup({ el, app, props, plugin }) {
        const vue = createApp({ render: () => h(app, props) });

        vue.use(plugin)
            .use(pinia)
            // .use(vGoogleTranslate)
            .mixin(translations)
            .mixin(format_money)
            .mixin({ methods: { route } })
            .component('Head', Head)
            .component('InertiaLink', Link);

        Sentry.init({
            vue,
            dsn: "https://90f57b6c8d3046029678637316705742@o4504465855021056.ingest.sentry.io/4504465860460544",
            // Set tracesSampleRate to 1.0 to capture 100%
            // of transactions for performance monitoring.
            // We recommend adjusting this value in production
            tracesSampleRate: 1.0,
            logErrors: true
        });

        vue.mixin(Sentry.createTracingMixins({ trackComponents: true }));
        Sentry.attachErrorHandler(vue, { logErrors: true });

        vue.config.globalProperties.$appName = import.meta.env.VITE_APP_NAME;


        vue.mount(el)
    },
});
InertiaProgress.init();


