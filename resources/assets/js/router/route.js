// import Layouts from '../layouts/google-contacts.vue'
import publicProfile from './dashboard/publicProfile.vue'
import Home from './dashboard/home.vue'
import productDetails from './products/productDetails.vue'
import checkOut from '../components/stepper/checkout.vue'
export const routes = [
	  { path: '/', component: Home},
	  { path: '/user/:uuid', component: publicProfile},
	  { path: '/product/details/:uuid', component: productDetails},
	  { path: '/checkout', component: checkOut },

	]