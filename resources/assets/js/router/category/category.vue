<template>
	<v-container fluid grid-list-md>
		<product-bread-crumbs></product-bread-crumbs>
	     <v-layout row wrap>

               <product
                 v-for="(product, index) in products.data"
                  v-bind:item="product"
                  v-bind:index="index"
                  v-bind:key="product.id"
                   
              >
              </product>

          </v-layout>
         <product-page></product-page>
   </v-container>

</template>

<script type="text/javascript">
	
	import axios from 'axios'
	import product from '../../components/cards/product.vue'
	import productBreadCrumbs from '../../components/breadcrumbs/home/product-breadcrumbs.vue'
  	import productPage from '../../components/pagination/productPage.vue'
	export default {
		data: () => ({
			
		}),
		created(){
			this.changeId()
		},
		components: {
			product, productBreadCrumbs, productPage
		},
		computed: {

	        products(){
	          return this.$store.getters.products
	        },
	        categoryId(){
	        	return this.$store.getters.categoryId
	        },
	        provinceId(){
	        	return this.$store.getters.provinceId
	        },
	        cityId(){
	        	return this.$store.getters.cityId
	        },
	        brgyId(){
	        	return this.$store.getters.brgyId
	        }
		},
		methods: {
			changeId(){
				let data = this
				axios.post(base + 'api/category/' + this.$route.params.catid,{
					provinceId: this.provinceId,
					cityId: this.cityId,
					brgyId: this.brgyId
		             
				})
				.then(function(response){
					data.$store.dispatch('products', response.data.items);
				})
				.catch()
				data.$store.dispatch('breadCrumbsItems', [
	              {
	                text: 'Home',
	                to: '/',
	              },
	              {
	                text: this.dashToSpace(this.$route.params.catname),
	                to: this.dashToSpace(this.$route.params.catname),
	              },
	              ])
			},
			dashToSpace(str){
				return str.replace(/-/g, ' ').replace(/\b\w/g, function(l){ return l.toUpperCase() })
			}
		},
		watch: {
			'$route' (to, from) {
			       let data = this
					axios.post(base + 'api/category/' + this.$route.params.id)
					.then(function(response){
						data.changeId()
					})
					.catch()
			    }
		}
	}
</script>