const state = {
    events: [],
    status: ''
};

const getters = {
    eventList: state => state.events,
    eventStatus: state => state.status
};

const actions = {
    event_request: ({ commit, dispatch }, show) => {
        return new Promise((resolve, reject) => {
            commit('EVENT_REQUEST');
            axios({ url: `shows/${show}/events`, data: {}, method: "GET" })
                .then(response => {
                    let events =  response.data.events;
                    commit('EVENT_SUCCESS', events);
                    resolve(events);
                })
                .catch(err => {
                    commit('EVENT_ERROR', err);
                    reject(err);
                });
        });
    },
};

const mutations = {
    EVENT_SUCCESS: (state, events) => {
        state.events = events;

    },
    EVENT_REQUEST: state => {
        state.status = "loading";
    },
    EVENT_ERROR: state => {
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