<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
		<v-flex xs12 sm12 md12 lg12 lx12>
			<details-b-c></details-b-c>
		</v-flex>
		
			<v-flex xs12 sm12 md8 lg8 lx8>
				<cards-p-d></cards-p-d>
			</v-flex>
			<v-flex xs12 sm12 md4 lg4 lx4>
				Ads Here!
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script type="text/javascript">
	import detailsBC from '../../components/breadcrumbs/detailsBC.vue'
	import cardsPD from '../../components/cards/productDetails.vue'
	import axios from 'axios'
	export default {

		components: {
			detailsBC, cardsPD
		},
		created(){
			let data = this
			axios.get(api_item + '/details/' + this.$route.params.itemUuid)
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