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

			this.$store.dispatch('items', 
				[
					{ icon: 'home', text: 'Home' },
					{ icon: 'account_circle', text: 'Account Settings' },
	        		{ icon: 'account_balance', text: 'Stores'},
	        		{ icon: 'chat_bubble', text: 'sample' },
	        		{ icon: 'help', text: 'Help' }
        		]
        	)

        	this.$store.dispatch('navBreadCrumbs', [
							{
								text: 'Home',
								to: '/',
								disabled: false
							},
							{
								text: 'Account Settings',
								disabled: false,
							}])
		}
	}
</script>