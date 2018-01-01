import Vue from 'vue'
import Vuex from 'vuex'
import { state } from './state.js'

Vue.use(Vuex)


export const store = new Vuex.Store({
	state,
	mutations: {
		firstname(state,firstname){
			state.users.firstname = firstname
		},
		lastname(state,lastname){
			state.users.lastname = lastname
		},
		company(state, company){
			state.users.company = company
		},
		jobTitle(state, jobTitle){
			state.users.jobTitle = jobTitle
		},
		jobtitle(state, jobTitle){
			state.users.jobTitle = jobTitle
		},
		email(state, email){
			state.users.email = email
		},
		mobile(state, mobile){
			state.users.mobile = mobile
		},
		password(state, password){
			state.users.password = password
		},

		//DIALOG//
		dialogLogin(state, value){
			state.dialog.login = value
		},
		dialogRegister(state, value){

			state.dialog.register = value
		},
		dialogLogin(state, value){
			state.dialog.login = value
		},
		successLogin(state, value){
			state.successLogin = value
		},

		//CATEGORIES
		categoryId(state, value){
			state.categoryId = value
		},	
		categories(state, value){
			state.categories = value
		},
		subcategoryId(state, value){
			state.subcategoryId = value
		},
		subcategories(state, value){
			state.subcategories = value
		},
		furtherCategories(state, value){
			state.furtherCategories = value
		},


		//ITEMS
		products(state, value){
			state.products = value
		},
		userProduct(state, value){
			state.userProduct = value
		},


		//USER PAGES
		user_current_page(state, value){
			state.user_current_page = value
		},



		//PAGES
		current_page(state, value){
			state.current_page = value
		},
		next_page_url(state, value){
			state.next_page_url = value
		},
		last_page_url(state, value){
			state.last_page_url = value
		},
		from(state, value){
			state.from = value
		},
		last_page(state, value){
			state.last_page = value
		},
		per_page(state, value){
			state.per_page = value
		},
		to(state, value){
			state.to = value
		},
		total(state, value){
			state.total = value
		},	

		//PROVINCES
		provinces(state, value){
			state.provinces = value
		},
		cities(state, value){
			state.cities = value
		},
		brgys(state, value){
			state.brgys = value
		},
		filterCategories(state, value){
			state.filterCategories = value
		},
		filterPlaces(state, value){
			state.filterPlaces = value
		},

		//BREADCRUMBS
		breadCrumbsItems(state, value){
			state.breadCrumbsItems = value
		},
		navBreadCrumbs(state, value){
			state.navBreadCrumbs = value
		}

	},
	actions: {
		users(store, value){
			
			store.commit(value['fieldName'], value['value'])
		},
		userInfo(store, user){

			for (var key in user){
				store.commit(key, user[key]);
			}

		},

		//DIALOG
		dialogCancel(store){
			store.commit('dialogLogin', false)
			store.commit('dialogRegister', false)
		},

		dialogRegister(store, value){
			store.commit('dialogRegister', value)
		},
		dialogLogin(store, value){
			store.commit('dialogLogin', value)
		},
		successLogin(store, value){
			store.commit('successLogin', value)
		},
		categories(store, value){
			store.commit('categories', value)
		},
		provinces(store, value){
			store.commit('provinces', value)
		},
		cities(store, value){
			store.commit('cities', value)
		},
		brgys(store, value){
			store.commit('brgys', value)
		},
		filterCategories(store, value){
			store.commit('filterCategories', value)
		},
		filterPlaces(store, value){
			store.commit('filterPlaces', value)
		},
		categoryId(store, value){
			store.commit('categoryId', value)
		},
		subcategoryId(store, value){
			store.commit('subcategoryId', value)
		},
		categories(store, value){
			store.commit('categories', value)
		},
		subcategories(store, value){
			store.commit('subcategories', value)
		},
		furtherCategories(store, value){
			store.commit('furtherCategories', value)
		},
		
		//USER ITEMS
		user_current_page(store, value){
			store.commit('user_current_page', value)
		},
		//ITEMS
		products(store, value){
			store.commit('products', value)
			store.commit('next_page_url', value.next_page_url)
			store.commit('last_page_url', value.last_page_url)
			store.commit('from', value.from)
			store.commit('last_page', value.last_page)
			store.commit('per_page', value.per_page)
			store.commit('to', value.to)
			store.commit('total', value.total)
		},
		userProduct(store, value){
			store.commit('userProduct', value)
		},
		current_page(store, value){
			store.commit('current_page', value);
		},

		//BREADCRUMBS

		breadCrumbsItemsPush(store, value){
			store.commit('breadCrumbsItems', [])
			store.state.breadCrumbsItems.push(value)
		},
		navBreadCrumbs(store, value){
			
			store.commit('navBreadCrumbs', value)
		},
		breadCrumbsItems(store, value){
			
			store.commit('breadCrumbsItems', value)
		},

		subCatBreadCrumbs(store, subcategories){

			var breadCrumbsItems = store.state.breadCrumbsItems

                  for (var key in breadCrumbsItems) {
                    if (key > 1 ) {
                        delete breadCrumbsItems[key]
                    }

                  }

            for (var i = subcategories.length - 1; i >= 0; i--) {
                  breadCrumbsItems.push(subcategories[i])
             }

            var breadCrumbsItems = store.state.breadCrumbsItems

            var cleanArray = [];
            	for(var key in breadCrumbsItems){
            		if(breadCrumbsItems[key] !== null || breadCrumbsItems[key] !== undefined){
            			cleanArray.push(breadCrumbsItems[key])
            		}
            	}

			store.commit('breadCrumbsItems', cleanArray)


		},
		furtherCatBreadCrumbs(store, furtherCategories){

			var breadCrumbsItems = store.state.breadCrumbsItems
			var subCatIds = store.state.subcategoryId.length
			var total = 1 + subCatIds;

                  for (var key in breadCrumbsItems) {
                    if (key >  total ) {
                        delete breadCrumbsItems[key]
                   	 }

                  	}

                   for (var i = furtherCategories.length - 1; i >= 0; i--) {
                  		breadCrumbsItems.push(furtherCategories[i])
             		}

            var cleanArray = [];
            	for(var key in breadCrumbsItems){
            		if(breadCrumbsItems[key] !== null || breadCrumbsItems[key] !== undefined){
            			cleanArray.push(breadCrumbsItems[key])
            		}
            	}

            store.commit('breadCrumbsItems', cleanArray)
		}


		


	},
	getters: {
		users(){

			return store.state.users
		},
		dialog(){

			return store.state.dialog
		},
		successLogin(){

			return store.state.successLogin
		},
		items(){

			return store.state.items
		},
		provinces(){
			return store.state.provinces
		},
		cities(){
			return store.state.cities
		},
		brgys(){
			return store.state.brgys
		},
		filterCategories(){
			return store.state.filterCategories
		},
		filterPlaces(){
			return store.state.filterPlaces
		},
		categoryId(){
			return store.state.categoryId
		},
		subcategoryId(){
			return store.state.subcategoryId
		},
		categories(){
			return store.state.categories
		},
		subcategories(){
			return store.state.subcategories
		},
		furtherCategories(){
			return store.state.furtherCategories
		},
		products(){
			return store.state.products
		},
		userProduct(){
			return store.state.userProduct
		},

		//USER PRODUCT PAGES
		user_current_page(){

			return store.state.user_current_page
		},




		//PRODUCT PAGES
		current_page(){

			return store.state.current_page
		},
		next_page_url(){

			return store.state.next_page_url
		},
		last_page_url(){

			return store.state.last_page_url
		},
		from(){

			return store.state.from
		},
		last_page(){

			return store.state.last_page
		},
		per_page(){

			return store.state.per_page
		},
		to(){

			return store.state.to
		},
		total(){

			return store.state.total
		},


		//BREADCRUMBS
		breadCrumbsItems(){
			return store.state.breadCrumbsItems
		},
		navBreadCrumbs(){
			return store.state.navBreadCrumbs
		}
	}
	
	
})

