import $axios from '@/config/axios.js';

const state = () => ({
    mainData: [],

});

const getters = {
    // 
}

const mutations = {
    ASSIGN_DATA(state, payload) {
        state.mainData = payload;
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


}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}