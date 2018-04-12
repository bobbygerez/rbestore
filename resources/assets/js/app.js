import axios from 'axios'
import Vue from 'vue'
import VueRouter from 'vue-router'

import Vuetify from 'vuetify'
import Master from './layouts/google-contacts.vue'


import { store } from './vuex/store.js'
import {routes} from './router/route.js'

import Viewer from 'v-viewer'

Vue.use(Viewer)

/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/

// var baseUrl = 'http://rbeph.it.nf/public/api/';
// window.base = 'http://rbeph.it.nf/public/'; 

var baseUrl = 'http://localhost/rbestore/public/api/';
window.base = 'http://localhost/rbestore/public/';

// var baseUrl = 'http://juanmerkado.it.nf/public/api/';
// window.base = 'http://juanmerkado.it.nf/public/'; 

window.api_startup = baseUrl + 'start-up';
window.api_register = baseUrl + 'auth/register';
window.api_login = baseUrl + 'auth/login';
window.api_getUser = baseUrl + 'user?token=';
window.api_logout = baseUrl + 'auth/logout?token=';
window.api_categories = baseUrl + 'categories';
window.api_further_categories = baseUrl + 'further_categories';
window.api_items = baseUrl + 'items';
window.api_item = baseUrl + 'item';
window.api_items_further_cat = baseUrl +'items/further_categories';
window.api_item_search = baseUrl + 'item/search'
window.api_province = baseUrl +'province';
window.api_city = baseUrl +'city';
window.api_brgy = baseUrl +'barangay';
window.api_user = baseUrl +'user/';
window.api_company = baseUrl + 'companies'

/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/
var allStartUp = {
  created: function () {

    let token = localStorage.getItem('tokenKey');
    let data = this
    // BEWARE OF THIS IF ERROR NO VUEX STORE DETECTED...
    let localCart = JSON.parse(localStorage.getItem('localCart'));

     if(localCart != null ){
        data.$store.dispatch('storageCart', localCart)
     }

     axios.get(api_categories)
              .then( function(response){
                  data.$store.dispatch('categories', response.data.categories);
              })
              .catch( function(error){

    })
    if(token != null && token.length > 30){
    	
    	axios.get(api_getUser + token)
    	.then(function(response){
    		
    		data.$store.dispatch('successLogin', true)
    		data.$store.dispatch('authUser', response.data.user)
    		
    	})
    	.catch(function(error){
            data.$store.dispatch('successLogin', false)
            localStorage.setItem('tokenKey', 'token_expired')
    	});
    }

    


  }

}


Vue.use(VueRouter)
Vue.use(Vuetify)

const router = new VueRouter({
  routes
})

const app = new Vue({
    el: '#app',
    store,
    router,
    mixins: [allStartUp],
    components: {
    	Master
    }
    
});


