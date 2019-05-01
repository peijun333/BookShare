import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user_id: 0
    },

    getters: {},

    mutations: {
        setUserId(state, payload) {
            state.user_id = payload.user_id;
        }
    },

    actions: {
        doUpdate({ commit }, message) {
            commit("setMessage", { message });
        }
    }
});
export default store;
