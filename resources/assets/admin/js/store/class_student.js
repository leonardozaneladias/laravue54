import  'vue-resource'
import  Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    students: []
};

const mutations = {
    set(state,student){
        state.students = student;
    }
};

const actions = {
    query(context, classInformationId){
        Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/${classInformationId}/students`)
            .then(response => {
                context.commit('set', response.data)
            })
    }

};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;