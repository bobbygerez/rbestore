import axios from 'axios'
import Vue from 'vue'
import VueRouter from 'vue-router'

import Vuetify from 'vuetify'
import Master from './layouts/google-contacts.vue'


import { store } from './vuex/store.js'
import {routes} from './router/route.js'



/******** USE FOR SHIFTING SERVER AND LOCAL DEVELOPMENT (APACHE SERVER) ***********/

// var baseUrl = 'http://rbeph.it.nf/public/api/';

var baseUrl = 'http://localhost/rbestore/public/api/';
window.base = 'http://localhost/rbestore/public/';


window.api_register = baseUrl + 'auth/register';
window.api_login = baseUrl + 'auth/login';
window.api_getUser = baseUrl + 'user?token=';
window.api_logout = baseUrl + 'auth/logout?token=';
window.api_categories = baseUrl + 'categories';
window.api_further_categories = baseUrl + 'further_categories';
window.api_items = baseUrl + 'items';
window.api_items_further_cat = baseUrl +'items/further_categories';
window.api_province = baseUrl +'province';
window.api_city = baseUrl +'city';
window.api_brgy = baseUrl +'barangay';
window.api_user = baseUrl +'user/';

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

var categories = {

    created: function(){

        let data = this

        axios.get(api_categories)
        .then( function(response){
            data.$store.dispatch('categories', response.data.categories);
        })
        .catch( function(error){

            return this.router.push(window.location.href)

        })
    }
}

var province = {

    created: function(){

        let data = this
        axios.get(api_province)
        .then( function(response){
            data.$store.dispatch('provinces', response.data.provinces);
        })
        .catch( function(error){

            return this.router.push(window.location.href)

        })
    }

}

var products = {

    created: function(){

        let data = this
        axios.get(api_items)
        .then( function(response){
             data.$store.dispatch('products', response.data.items);
        })
        .catch( function(error){

            return this.router.push(window.location.href)
        })
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
    mixins: [login, categories, province, products],
    components: {
    	Master
    }
});


