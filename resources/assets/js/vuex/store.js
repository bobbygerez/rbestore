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
		items(state, value){
			state.items = value
		},

		//PROVINCES
		provinces(state, value){
			state.provinces = value
		},
		filterCategories(state, value){
			state.filterCategories = value
		}

	},
	actions: {
		users(store, value){
			
			store.commit(value['fieldName'], value['value'])
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
		filterCategories(store, value){
			store.commit('filterCategories', value)
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
		

		//ITEMS
		items(store, value){
			store.commit('items', value);
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
		filterCategories(){
			return store.state.filterCategories
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
		items(){
			return store.state.items
		}
	}
	
	
})

