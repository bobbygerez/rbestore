import Vue from 'vue'
import Vuex from 'vuex'
import { state } from './state.js'

Vue.use(Vuex)


export const store = new Vuex.Store({
	state,
	mutations: {
		cart(state, value){
			state.cart = value
		},
		cartQuantity(state, value){
			state.cartQuantity = value
		},
		drawer(state, value){
			state.drawer = value
		},
		dialogColors(state, value){
			state.dialogColors = value
		},

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


		userProfile(state, userProfile){
			state.userProfile = userProfile
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
		furtherCatId(state, value){
			state.furtherCatId = value
		},


		//ITEMS
		products(state, value){
			state.products = value
		},
		productCurrentPage(state, value){
			state.products.current_page = value
		},
		userProduct(state, value){
			state.userProduct = value
		},
		productDetails(state, value){
			state.productDetails = value
		},
		selectedColorId(state, value){
			state.selectedColorId = value
		},
		selectedSizeId(state, value){
			state.selectedSizeId = value
		},

		//USER PAGES
		user_current_page(state, value){
			state.user_current_page = value
		},


		//PROVINCES
		provinces(state, value){
			state.provinces = value
		},
		provinceId(state, value){
			state.provinceId = value
		},
		cities(state, value){
			state.cities = value
		},
		cityId(state, value){
			state.cityId = value
		},
		brgys(state, value){
			state.brgys = value
		},
		brgyId(state, value){
			state.brgyId = value
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

		cartQuantity(store, value){
			store.commit('cartQuantity', value)
		},
		cart(store, value){
			var cart = store.state.cart;

			if(cart === null){
				store.commit('cart', [value]);
			}
			else {
				cart.push(value);
				var newCart = store.state.cart;
				store.commit('cart', newCart);
			}
            
		},
		drawer(store, value){
			store.commit('drawer', value)
		},

		dialogColors(store, value){
			store.commit('dialogColors', value)
		},

		users(store, value){
			
			store.commit(value['fieldName'], value['value'])
		},
		userInfo(store, user){

			for (var key in user){
				store.commit(key, user[key]);
			}

		},
		userProfile(store, userProfile){
			store.commit('userProfile', userProfile)
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
		selectedColorId(store, value){
			store.commit('selectedColorId', value)
		},
		selectedSizeId(store, value){
			store.commit('selectedSizeId', value)
		},


		//PLACES
		provinces(store, value){
			store.commit('provinces', value)
		},
		provinceId(store, value){
			store.commit('provinceId', value)
		},
		cities(store, value){
			store.commit('cities', value)
		},
		cityId(store, value){
			store.commit('cityId', value)
		},
		brgys(store, value){
			store.commit('brgys', value)
		},
		brgyId(store, value){
			store.commit('brgyId', value)
		},
		filterCategories(store, value){
			store.commit('filterCategories', value)
		},
		filterPlaces(store, value){
			store.commit('filterPlaces', value)
		},


		//CATEGORIES
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
		furtherCatId(store, value){
			store.commit('furtherCatId', value)
		},
		
		//USER ITEMS
		user_current_page(store, value){
			store.commit('user_current_page', value)
		},
		//ITEMS
		products(store, value){
			store.commit('products', value)
		
		},
		productDetails(store, value){
			store.commit('productDetails', value)
		},

		productCurrentPage(store, value){
			store.commit('productCurrentPage', value)
		},
		userProduct(store, value){
			store.commit('userProduct', value)
		},
		// current_page(store, value){
		// 	store.commit('current_page', value);
		// },

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
		drawer(){
			return store.state.drawer
		},

		dialogColors(){
			return store.state.dialogColors
		},
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

		//PLACES
		provinces(){
			return store.state.provinces
		},
		provinceId(){
			return store.state.provinceId
		},
		cities(){
			return store.state.cities
		},
		cityId(){
			return store.state.cityId
		},	
		brgys(){
			return store.state.brgys
		},
		brgyId(){
			return store.state.brgyId
		},



		filterCategories(){
			return store.state.filterCategories
		},
		filterPlaces(){
			return store.state.filterPlaces
		},



		//CATEGORIES
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
		furtherCatId(){
			return store.state.furtherCatId
		},




		products(){
			return store.state.products
		},
		selectedColorId(){
			return store.state.selectedColorId
		},
		selectedSizeId(){
			return store.state.selectedSizeId
		},
		userProduct(){
			return store.state.userProduct
		},
		productDetails(){
			return store.state.productDetails
		},

		//USER PRODUCT PAGES
		user_current_page(){

			return store.state.user_current_page
		},
		userProfile(){

			return store.state.userProfile
		},


		//BREADCRUMBS
		breadCrumbsItems(){
			return store.state.breadCrumbsItems
		},
		navBreadCrumbs(){
			return store.state.navBreadCrumbs
		},
		cartQuantity(){
			return store.state.cartQuantity
		}
	}
	
	
})

