<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
			<v-flex xs12 sm4 md6 lg6 lx6>
				<h1 class="title">asdf</h1>
			</v-flex>
			<v-flex xs12 sm8 md6 lg6 lx6>
				<product-carousel></product-carousel>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script type="text/javascript">
	import productCarousel from '../../components/carousel/productCarousel.vue'
	import axios from 'axios'
	export default {

		components: {

			productCarousel
		},
		created(){
			let data = this
			axios.get(api_item + '/details/' + this.$route.params.uuid)
			.then(function(response){
				data.$store.dispatch('productDetails', response.data.item)
			})
			.catch()

		},
		methods: {


		}
	}
</script>