require('./bootstrap');

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import {Quasar, Dialog} from 'quasar'

const QuasarConfig = {
    plugins: {
        Dialog
    },
    config : {
        brand: {
            primary  : '#0342A1',
            secondary: '#DA0627',
            accent   : '#FCFDFF',
            light    : '#EFF3F8',
            dark     : '#484A4E',
            danger   : '#F09F9F',
            success  : '#6FCF97',
        }
    }
}

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title  : (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .use(Quasar, QuasarConfig)
            .mixin({methods: {route}})
            .mount(el);
    },
});

InertiaProgress.init({color: '#4B5563'});
