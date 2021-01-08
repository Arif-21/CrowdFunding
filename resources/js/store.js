import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersist from 'vuex-persist'
import auth from './stores/auth.js'
import alert from './stores/alert.js'
import dialog from './stores/dialog.js'
import transaction from './stores/transaction.js'

const vuexPersist = new VuexPersist({
    key: 'sanbercode',
    storage: localStorage
})

Vue.use(Vuex)

export default new Vuex.Store({
    plugins: [vuexPersist.plugin],
    modules: {
        auth,
        alert,
        dialog,
        transaction,
    }
})