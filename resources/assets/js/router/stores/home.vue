<template>
	 <v-container fluid grid-list-md>
	 	 <v-layout row wrap>
	 		<store
	 		 v-for="(company, index) in companies.data"
             v-bind:company="company"
             v-bind:index="index"
             v-bind:key="company.id"
	 		></store>
	 	</v-layout>
  	 </v-container>

</template>

<script type="text/javascript">
	import store from '../../components/cards/store/store.vue'

	export default {

		components: {
			store
		},
		computed: {

			companies(){

				return this.$store.getters.companies
			}
		}
	}
</script>