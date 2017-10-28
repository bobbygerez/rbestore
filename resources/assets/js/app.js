import axios from 'axios'
import Vue from 'vue'

import Vuetify from 'vuetify'
import Master from './layouts/google-contacts.vue'
Vue.use(Vuetify)


import { store } from './vuex/store.js'

/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/
window.api_register = 'http://localhost/rbestore/public/api/auth/register';

/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/


const app = new Vue({
    el: '#app',
    store,
    components: {
    	Master
    }
});
