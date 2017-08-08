export default new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',

    state: {
        auth: {},
    },

    mutations: {
        setAuth: (state, auth) => state.auth = auth,
    },
});
