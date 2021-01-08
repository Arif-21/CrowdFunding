export default {
    namespaced: true,
    state: {
        transactions: 0,
    },
    mutations: {
        insert: (state, payload) => {
            state.transactions++
        },
        delete: (state, paylaod) => {
            state.transactions = 0
        }
    },
    actions: {

    },
    getters: {
        transactions: state => state.transactions
    },
}