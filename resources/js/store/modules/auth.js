import auth_api from '../../api/auth';

const state = {
    token: localStorage.getItem("user-token") || "",
    status: "",
};

const getters = {
    isAuthenticated: state => !!state.token,
    authStatus: state => state.status
};

const actions = {
    auth_request: ({ commit, dispatch }, user) => {
        return new Promise((resolve, reject) => {
            auth_api.login(user.email, user.password)
                .then(token => {
                    commit('AUTH_SUCCESS', token);
                    resolve();
                })
                .catch(err => {
                    commit('AUTH_ERROR', err);
                    reject();
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
    AUTH_SUCCESS: (state, token) => {
        console.log("token", token);
        localStorage.setItem("user-token", token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

        state.status = "success";
        state.token = token;
    },
    AUTH_REQUEST: state => {
        state.status = "loading";
    },
    AUTH_ERROR: state => {
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