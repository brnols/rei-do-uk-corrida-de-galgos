require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import {Quasar, Dialog} from 'quasar'

const QuasarConfig = {
    plugins: {
        Dialog
    },
    config: {
        brand  : {
            primary   : '#628C2B',
            secondary : '#45661B',
            accent    : '#9C27B0',
            dark      : '#000000',
            positive  : '#2ACD7F',
            negative  : '#FF5353',
            info      : '#31CCEC',
            warning   : '#F2C037',
            background: '#F3F4F2'
        }
    }
}

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Quasar, QuasarConfig)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
