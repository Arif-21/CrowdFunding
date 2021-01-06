import Vue from 'vue'
import Vuex from 'vuex'
import alert from './stores/alert.js'
import transaction from './stores/transaction.js'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        alert,
        transaction
    }
})