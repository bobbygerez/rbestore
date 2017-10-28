import axios from 'axios'
import Vue from 'vue'

import Vuetify from 'vuetify'
import Master from './layouts/google-contacts.vue'
Vue.use(Vuetify)


import { store } from './vuex/store.js'


const app = new Vue({
    el: '#app',
    store,
    components: {
    	Master
    }
});
