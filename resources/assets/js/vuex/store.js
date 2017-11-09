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
		}

	},
	getters: {
		users(){

			return store.state.users
		},
		dialog(){

			return store.state.dialog
		}
	}
	
	
})

