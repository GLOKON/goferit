require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(Vuex);

import StoreData from './store';
import { routes } from './routes';

import { initialize } from './helpers/general';

import App from './views/App.vue';

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

initialize(store, router);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store,
    metaInfo () {
        const { appName } = window.config;
        return {
            title: appName,
            titleTemplate: `%s · ${appName}`
        }
    },
});