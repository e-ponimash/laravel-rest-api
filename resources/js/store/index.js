import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./modules/auth";
import show from './modules/show'
import event from './modules/event'
import places from './modules/places'
import registration from './modules/registration'
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth: auth,
        show: show,
        registration: registration,
        event: event,
        places: places
    }
});