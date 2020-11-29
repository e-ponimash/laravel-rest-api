const state = {
    places: [],
    status: ''
};

const getters = {
    placeList: state => state.places,
    placeStatus: state => state.status
};

const actions = {
    places_request: ({ commit, dispatch }, event) => {
        return new Promise((resolve, reject) => {
            commit('EVENT_REQUEST');
            axios({ url: `events/${event}/places`, data: {}, method: "GET" })
                .then(response => {
                    console.log("response.data", response.data.places);
                    let places =  response.data.places;
                    commit('EVENT_SUCCESS', places);
                    resolve(places);
                })
                .catch(err => {
                    commit('EVENT_ERROR', err);
                    reject(err);
                });
        });
    },
};

const mutations = {
    EVENT_SUCCESS: (state, places) => {
        state.places = places;
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