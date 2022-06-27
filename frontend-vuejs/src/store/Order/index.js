import $axios from '@/config/axios.js';
// import store from './index.js';

const state = () => ({
    mainData: [],
    detailData: null,
    services: [],
    servicesJson: []
});

const getters = {
    // 
}

const mutations = {
    ASSIGN_DATA(state, payload) {
        state.mainData = payload;
    },
    SET_DETAIL_DATA(state, payload) {
        state.detailData = payload;
    },
    SET_SERVICES(state, payload) {
        state.services = payload;
    },
    SET_SERVICES_JSON(state, payload) {
        state.servicesJson = payload;
    },
}

const actions = {
    GET_ORDERS({ commit }) {
        return new Promise((resolve, reject) => {
            $axios.get('order')
                .then((response) => {
                    let data = response.data;
                    if (data) {
                        commit('ASSIGN_DATA', data.data);
                    }
                    resolve(data);
                })
                .catch((error) => {
                    const errorText = error.response.data
                    commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                    reject(errorText.message);
                });
        });
    },
    GET_DETAIL({ commit }, payload) {
        return new Promise((resolve, reject) => {
            $axios.get(`order/${payload}`)
                .then((response) => {
                    let data = response.data;
                    if (data) {
                        commit('SET_DETAIL_DATA', data.data);
                        commit('SET_SERVICES', data.data.services);
                        commit('SET_SERVICES_JSON', data.data.services_json);
                    }
                    resolve(data);
                })
                .catch((error) => {
                    const errorText = error.response.data
                    commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                    reject(errorText.message);
                });
        });
    },
    GET_DETAIL_SERVICE({ commit }, payload) {
        return new Promise((resolve, reject) => {
            $axios.get(`serviceHeader/${payload}`)
                .then((response) => {
                    let data = response.data;
                    if (data) {
                        console.log(data);
                    }
                    resolve(data);
                })
                .catch((error) => {
                    const errorText = error.response.data
                    commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                    reject(errorText.message);
                });
        });
    },

}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}