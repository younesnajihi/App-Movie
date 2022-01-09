require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';



createInertiaApp({
    title: (title) => `${title} - ${"Laravel"}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app: inertiaApp, props, plugin }) {
        return createApp({ render: () => h(inertiaApp, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });