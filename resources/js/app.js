import Vue from 'vue'
import store from './store.js'
import router from './router.js'
import vuetify from './plugins/vuetify.js'
import './bootstrap.js'

import App from './App.vue'

const app = new Vue({
    el: '#app',
    store,
    router,
    vuetify,
    components: {
        App
    },
});