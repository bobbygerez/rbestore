// import Layouts from '../layouts/google-contacts.vue'
import publicProfile from './dashboard/publicProfile.vue'
import dashboard from './dashboard/user.vue'
import productDetails from './products/productDetails.vue'
import checkOut from '../components/stepper/checkout.vue'
import companies from './stores/home.vue'
import branches from '../components/cards/store/branches.vue'

export const routes = [
	  { path: '/', component: companies},
	  { path: '/dashboard/user/:uuid', component: dashboard},
	  { path: '/user/items/:uuid', component: publicProfile},
	  { path: '/product/details/:uuid', component: productDetails},
	  { path: '/checkout', component: checkOut },
	  { path: '/company/:branchProduct', component: branches }

	]