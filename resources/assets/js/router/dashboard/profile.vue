<template>
	<v-container fluid grid-list-md>
	  <user-bread-crumbs></user-bread-crumbs>
	 
      <v-layout row wrap>
             <user-product
                 v-for="(product, index) in userProduct.data"
                  v-bind:item="product"
                  v-bind:index="index"
                  v-bind:key="product.id"
                   
              >
              </user-product>
     </v-layout>
     <user-product-page></user-product-page>
   </v-container>
</template>

<script type="text/javascript">
	import axios from 'axios'
	import userBreadCrumbs from '../../components/breadCrumbs/userBreadCrumbs.vue'
	import userProduct from '../../components/cards/userProduct.vue'
	import userProductPage from '../../components/pagination/userProductPage.vue'

	export default{


		created() {

			this.getUserInfo()
			

		},
		components: {
			userBreadCrumbs, userProduct, userProductPage
		},
		computed: {
			users(){
				return this.$store.getters.users
			},
			userProduct(){
				return this.$store.getters.userProduct
			}
		},
		methods: {

			getUserInfo(){
				let data = this;

				axios.get(api_user + this.$route.params.uuid)
					.then((response)=>{
						data.$store.dispatch('userInfo', response.data.user)
						data.$store.dispatch('navBreadCrumbs', [
							{
								text: 'Home',
								to: '/',
								disabled: false
							},
							{
								text: response.data.user.firstname + ' ' + response.data.user.lastname,
								disabled: false,
							}])
						data.$store.dispatch('userProduct', response.data.items)
					})
					.catch((response) => {

					})
			}
		}
	}


</script>