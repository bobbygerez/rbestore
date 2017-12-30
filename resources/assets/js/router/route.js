import Layouts from '../layouts/google-contacts.vue'
import Profile from './dashboard/profile.vue'
import Home from './dashboard/home.vue'

export const routes = [
	  { path: '/', component: Layouts},
	  { path: '/home', component: Home},
	  { path: '/profile', component: Profile}

	]