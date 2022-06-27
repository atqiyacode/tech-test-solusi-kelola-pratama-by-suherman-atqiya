import axios from 'axios';
import store from '../store';

const instance = axios.create({
    baseURL: process.env.VUE_APP_API,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    }
});

instance.interceptors.response.use((response) => {
    return response;
}, (error) => {
    if (error.response.status === 401 && store.state.accessToken !== '') {
        store.dispatch('CLEAR_SESSION', {
            root: true
        });
    }
    return Promise.reject(error);
});



instance.interceptors.request.use(
    (config) => {

        if (localStorage.getItem('accessToken')) config.headers.Authorization = `Bearer ${localStorage.getItem('accessToken')}`;

        return config;
    },
    (error) => {
        Promise.reject(error);
    }
);

export default instance;