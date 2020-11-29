const state = {
    shows: [],
    status:''
};

const getters = {
    showList: state => state.shows,
    showStatus: state => state.status
};

const actions = {
    show_request: ({ commit, dispatch },) => {
        return new Promise((resolve, reject) => {
            commit('SHOW_REQUEST');
            axios({ url: "shows", data: {}, method: "GET" })
                .then(response => {
                    let shows =  response.data.shows;
                    commit('SHOW_SUCCESS', shows);
                    resolve(response.data.shows);
                })
                .catch(err => {
                    commit('SHOW_ERROR', err);
                    reject(err);
                });
        });
    },
};

const mutations = {
    SHOW_SUCCESS: (state, shows) => {
        state.shows = shows;
    },
    SHOW_REQUEST: state => {
        state.status = "loading";
    },
    SHOW_ERROR: state => {
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