// import Layouts from '../layouts/google-contacts.vue'
import Profile from './dashboard/profile.vue'
import Home from './dashboard/home.vue'
import Category from './category/category.vue'

export const routes = [
	  { path: '/', component: Home},
	  { path: '/user/:uuid', component: Profile},
	  { path: '/:cat', component: Category}

	]