<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
		<v-flex xs12 sm12 md12 lg12 lx12>
			<details-b-c></details-b-c>
		</v-flex>
		
			<v-flex xs12 sm12 md8 lg8 lx8>
				<h1 class="headline ml-2">Branches</h1>
				<branch></branch>
			</v-flex>
			<v-flex xs12 sm12 md4 lg4 lx4>
				Ads Here!
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script type="text/javascript">
	import detailsBC from '../../../components/breadcrumbs/detailsBC.vue'
	import branch from '../../../components/cards/store/branch.vue'
	import axios from 'axios'
	export default {

		components: {
			detailsBC, branch
		},
		created(){
			let data = this
			let branchProduct = this.$route.params.branchProduct
			axios.get(window.base + '/api/company/' + branchProduct)
			.then(function(response){
				data.$store.dispatch('company', response.data.company)
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