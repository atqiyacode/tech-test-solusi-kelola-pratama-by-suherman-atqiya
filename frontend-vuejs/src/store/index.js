import { createStore } from 'vuex'
import router from '../router/index';

import auth from './auth/authentication'
import order from './order'
import upload from './upload'

export default createStore({
    state: {
        language: window.navigator.language,
        isMobile: (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)),
        isOnline: navigator.onLine ? true : false,
        accessToken: localStorage.getItem('accessToken'),
        userSession: localStorage.getItem('userSession'),
        errors: {},

    },
    getters: {
        isLoggedIn: state => {
            return (state.accessToken && state.accessToken !== 'null') ? true : false;
        },
        activeUser: () => {
            return localStorage.getItem('userSession');
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
            localStorage.removeItem('userSession');
            router.push({
                name: 'login'
            });
        },
    },
    actions: {
        CLEAR_SESSION() {
            localStorage.removeItem('accessToken');
            localStorage.removeItem('userSession');
            router.push({
                name: 'login'
            });
        },
    },
    modules: {
        auth,
        order,
        upload,
    }
})