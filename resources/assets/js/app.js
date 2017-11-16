import axios from 'axios'
import Vue from 'vue'

import Vuetify from 'vuetify'
import Master from './layouts/google-contacts.vue'
Vue.use(Vuetify)


import { store } from './vuex/store.js'

/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/
window.api_register = 'http://localhost/rbestore/public/api/auth/register';
window.api_login = 'http://localhost/rbestore/public/api/auth/login';
window.api_getUser = 'http://localhost/rbestore/public/api/user?token=';
window.api_logout = 'http://localhost/rbestore/public/api/auth/logout?token=';
/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/

var login = {
  created: function () {
    let token = localStorage.getItem('tokenKey');
    if(token != null){
    	let data = this
    	axios.get(api_getUser + token)
    	.then(function(response){
    		
    		data.$store.dispatch('successLogin', true)
    		data.$store.dispatch('users', { 
                fieldName: 'firstname',
                value: response.data.result.firstname
            })
            data.$store.dispatch('users', { 
                fieldName: 'lastname',
                value: response.data.result.lastname
            })
    		
    	})
    	.catch(function(error){
            data.$store.dispatch('successLogin', false)
    	});
    }


  }
}

const app = new Vue({
    el: '#app',
    store,
    mixins: [login],
    components: {
    	Master
    }
});
