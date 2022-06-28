import $axios from '@/config/axios.js';
import store from '../index.js';

const state = () => ({
    loginField: {
        email: '',
        password: '',
    },
    registerField: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    },
    redirectTo: '',
});

const getters = {
    // 
}

const mutations = {
    LOGIN_FIELD_FORM(state, payload) {
        state.loginField = payload;
    },
    CLEAR_LOGIN_FIELD(state) {
        state.loginField = {
            email: '',
            password: '',
        }
    },
    REGISTER_FIELD_FORM(state, payload) {
        state.loginField = payload;
    },
    CLEAR_REGISTER_FIELD(state) {
        state.registerField = {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    SET_REDIRECT(state, payload) {
        state.redirectTo = payload;
    },
}

const actions = {
    DO_LOGIN({ commit, state }) {
        return new Promise((resolve, reject) => {
            $axios.post('login', state.loginField)
                .then((response) => {
                    let data = response.data;
                    if (data.access_token) {
                        localStorage.setItem('accessToken', data.access_token);
                        localStorage.setItem('userSession', JSON.stringify(data.userSession));
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
    DO_REGISTER({
        commit,
        state
    }) {
        return new Promise((resolve, reject) => {
            $axios.post(`register`, state.registerField).then((response) => {
                let data = response.data;
                if (data.access_token) {
                    localStorage.setItem('accessToken', data.access_token);
                    localStorage.setItem('userSession', JSON.stringify(data.userSession));
                }
                resolve(response.data);
            }).catch((error) => {
                const errorText = error.response.data
                commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                reject(errorText.message);
            });
        });
    },
    DO_LOGOUT({ commit }) {
        return new Promise((resolve, reject) => {
            $axios.post('logout')
                .then((response) => {
                    let data = response.data;
                    store.dispatch('CLEAR_SESSION', { root: true });
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