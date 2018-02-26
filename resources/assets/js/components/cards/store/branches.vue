<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
		<v-flex xs12 sm12 md12 lg12 lx12>
			<details-b-c></details-b-c>
		</v-flex>
		
			<v-flex xs12 sm12 md12 lg12 lx12>
				<h1 class="headline text-lg-center text-md-center text-sm-center text-xs-center">Displaying from {{ branchProducts.from }} to  {{ branchProducts.to }} out of {{ branchProducts.total }} </h1>
				
			</v-flex>
			<branch-product  
				v-for="(product, index) in branchProducts.data"
             	v-bind:product="product"
            	v-bind:index="index"
             	v-bind:key="product.id">
             		
            </branch-product>
		
		</v-layout>
		<product-pagination></product-pagination>
	</v-container>
</template>

<script type="text/javascript">
	import detailsBC from '../../../components/breadcrumbs/detailsBC.vue'
	import branchProduct from '../../../components/cards/store/branchProduct.vue'
	import productPagination from '../../../components/pagination/store/productPagination.vue'
	import axios from 'axios'
	export default {

		data: () => ({
		      page: 1,
		    }),
		components: {
			detailsBC, branchProduct, productPagination
		},
		computed:{
			branchProducts(){
				return this.$store.getters.branchProducts
			}
		},
		created(){
			let data = this
			let branchProduct = this.$route.params.branchProduct
			axios.get(window.base + '/api/company/' + branchProduct + '/' + this.page)
			.then(function(response){
				data.$store.dispatch('branchProducts', response.data.brancProducts)
				data.$store.dispatch('navBreadCrumbs', [
							{
								text: 'Home',
								to: '/',
								disabled: false
							},
							{
								text: branchProduct,
								disabled: false,
							}])
			})
			.catch()

		},
		methods: {


		}
	}
</script>