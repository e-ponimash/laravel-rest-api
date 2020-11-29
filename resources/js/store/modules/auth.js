const state = {
    token: localStorage.getItem("user-token") || "",
    status: "",
    hasLoadedOnce: false
};

const getters = {
    isAuthenticated: state => !!state.token,
    authStatus: state => state.status
};

const actions = {
    auth_request: ({ commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            commit('AUTH_REQUEST');
            axios({ url: "login", data: user, method: "POST" })
                .then(resp => {
                    commit('AUTH_SUCCESS', resp);
                    resolve(resp);
                })
                .catch(err => {
                    commit('AUTH_ERROR', err);
                    reject(err);
                });
        });
    },
    auth_logout: ({ commit }) => {
        return new Promise(resolve => {
            commit('AUTH_LOGOUT');
            resolve();
        });
    }
};

const mutations = {
    AUTH_LOGOUT: state => {
        localStorage.removeItem("user-token");
        delete axios.defaults.headers.common['Authorization'];
        state.token = "";
    },
    AUTH_SUCCESS: (state, resp) => {
        console.log("resp", resp)
        let token = resp.data.data.api_token;
        localStorage.setItem("user-token", token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        state.status = "success";
        state.token = resp.token;
        state.hasLoadedOnce = true;
    },
    AUTH_REQUEST: state => {
        state.status = "loading";
    },
    AUTH_ERROR: state => {
        state.status = "error";
        state.hasLoadedOnce = true;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};