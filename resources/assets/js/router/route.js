// import Layouts from '../layouts/google-contacts.vue'
import Profile from './dashboard/profile.vue'
import Home from './dashboard/home.vue'

export const routes = [
	  { path: '/', component: Home},
	  { path: '/user/:uuid', component: Profile},

	]