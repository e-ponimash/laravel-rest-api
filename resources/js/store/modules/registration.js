const state = {
    status: "",
};

const getters = {
    registerStatus: state => state.status
};

const actions = {
    registration_request: ({ commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            commit('REGISTER_REQUEST');
            axios({ url: "register", data: user, method: "POST" })
                .then(resp => {
                    commit('REGISTER_SUCCESS', resp);
                    resolve(resp);
                })
                .catch(err => {
                    commit('REGISTER_ERROR', err);
                    reject(err);
                });
        });
    },
};

const mutations = {
    REGISTER_SUCCESS: state => {
        state.status = "success";
    },
    REGISTER_REQUEST: state => {
        state.status = "loading";
    },
    REGISTER_ERROR: state => {
        state.status = "error";
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};