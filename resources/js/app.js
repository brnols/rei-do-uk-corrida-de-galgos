require('./bootstrap');

import AppLayout from "@/Layouts/App"
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import {Quasar, Dialog} from 'quasar'
import iconSet from 'quasar/icon-set/fontawesome-v5'

import BaseCard from "@/Components/BaseCard";

const QuasarConfig = {
    plugins: {
        Dialog
    },
    config : {
        brand    : {
            primary  : '#0342A1',
            secondary: '#DA0627',
            accent   : '#FCFDFF',
            light    : '#EFF3F8',
            dark     : '#484A4E',
            danger   : '#F09F9F',
            success  : '#6FCF97',
        },
        extras   : [
            'fontawesome-v5',
            'material-icons'
        ],
        framework: {
            iconSet: iconSet
        }
    }
}

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const app = createInertiaApp({
    title  : (title) => `${title} - ${appName}`,
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || AppLayout
        return page
    },
    setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(plugin)
            .component('base-card', BaseCard)
            .use(Quasar, QuasarConfig)
            .mixin({methods: {route}})
            .mount(el);
    },
});



InertiaProgress.init({color: '#4B5563'});
