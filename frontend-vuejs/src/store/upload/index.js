import $axios from '@/config/axios.js';

const state = () => ({
    // 
});

const getters = {
    // 
}

const mutations = {
    // 
}

const actions = {

    UPLOAD_IMAGE({ commit }, payload) {
        return new Promise((resolve, reject) => {
            let formData = new FormData();
            formData.append("image", payload);
            $axios.post('upload/image', formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    }
                })
                .then((response) => {
                    let data = response.data;
                    resolve(data);
                })
                .catch((error) => {
                    const errorText = error.response.data
                    commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                    reject(errorText.message);
                });
        });
    },

    UPLOAD_VIDEO({ commit }, payload) {
        return new Promise((resolve, reject) => {
            let formData = new FormData();
            formData.append("video", payload);
            $axios.post('upload/video', formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    }
                })
                .then((response) => {
                    let data = response.data;
                    resolve(data);
                })
                .catch((error) => {
                    const errorText = error.response.data
                    commit('SET_ERRORS', JSON.stringify(errorText), { root: true });
                    reject(errorText.message);
                });
        });
    },
    UPLOAD_DOCUMENT({ commit }, payload) {
        return new Promise((resolve, reject) => {
            let formData = new FormData();
            formData.append("document", payload);
            $axios.post('upload/document', formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    }
                })
                .then((response) => {
                    let data = response.data;
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