import { createStore } from 'vuex'
import router from '../router/index';

import auth from './auth/authentication'

export default createStore({
    state: {
        language: window.navigator.language,
        isMobile: (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)),
        isOnline: navigator.onLine ? true : false,
        accessToken: localStorage.getItem('accessToken'),
        errors: {},

    },
    getters: {
        isLoggedIn: state => {
            return (state.accessToken && state.accessToken !== 'null') ? true : false;
        },
    },
    mutations: {
        CLEAR_ERRORS(state) {
            state.errors = {};
        },
        SET_ERRORS(state, payload) {
            state.errors = payload;
        },
        CLEAR_SESSION() {
            localStorage.removeItem('accessToken');
            router.push({
                name: 'login'
            });
        },
    },
    actions: {
        CLEAR_SESSION() {
            localStorage.removeItem('accessToken');
            router.push({
                name: 'login'
            });
        },
    },
    modules: {
        auth,
    }
})