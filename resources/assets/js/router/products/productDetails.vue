<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
		<v-flex xs12 sm12 md12 lg12 lx12>
			<details-b-c></details-b-c>
		</v-flex>
		
			<v-flex xs12 sm5 md6 lg6 lx6>
				<cards-p-d></cards-p-d>
			</v-flex>
			<v-flex xs12 sm7 md6 lg6 lx6>
				<product-carousel></product-carousel>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script type="text/javascript">
	import detailsBC from '../../components/breadcrumbs/detailsBC.vue'
	import cardsPD from '../../components/cards/productDetails.vue'
	import productCarousel from '../../components/carousel/productCarousel.vue'
	import axios from 'axios'
	export default {

		components: {

			productCarousel, detailsBC, cardsPD
		},
		created(){
			let data = this
			axios.get(api_item + '/details/' + this.$route.params.uuid)
			.then(function(response){
				data.$store.dispatch('productDetails', response.data.item)
				data.$store.dispatch('navBreadCrumbs', [
							{
								text: 'Home',
								to: '/',
								disabled: false
							},
							{
								text: response.data.item.name,
								disabled: false,
							}])
			})
			.catch()

		},
		methods: {


		}
	}
</script>