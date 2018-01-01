<template>
	<v-container fluid grid-list-md>
	  <bread-crumbs></bread-crumbs>
      <v-layout row wrap>
      	<v-flex>
             <h1>{{ name }}</h1>
        </v-flex>
     </v-layout>
   </v-container>
</template>

<script type="text/javascript">
	import axios from 'axios'
	import breadCrumbs from '../../components/breadCrumbs/navBreadCrumbs.vue'
	export default{

		data: () => ({
		      name: null,
		      
		    }),

		created() {

			this.getUserInfo()
			

		},
		components: {
			breadCrumbs
		},
		computed: {
			users(){
				return this.$store.getters.users
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
					})
					.catch((response) => {

					})
			}
		}
	}


</script>