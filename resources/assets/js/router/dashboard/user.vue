<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
			<v-flex xs12 sm12 md12 lg12 lx12>
				<details-b-c></details-b-c>
			</v-flex>
			
		</v-layout>
	</v-container>
</template>
<script type="text/javascript">
	import detailsBC from '../../components/breadcrumbs/detailsBC.vue'
	import axios from 'axios'
	export default {
		components: {
			detailsBC
		},
		computed: {
			authUser(){
				return this.$store.getters.authUser
			}
		},
		created(){
			this.changeBranches()
		},
		methods: {
			changeBranches(){

	        	this.$store.dispatch('navBreadCrumbs', [
								{
									text: 'Home',
									to: '/',
									disabled: false
								},
								{
									text: 'Dashboard',
									disabled: false,
								}])
			}
		},

		watch: {
			authUser(){
				this.changeBranches()			
        	}
		}
	}
</script>