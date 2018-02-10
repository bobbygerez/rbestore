<template>
	 <v-container fluid grid-list-md>
	 	 <home-b-c></home-b-c>
	 	 <v-layout row wrap>
	 		<store
	 		 v-for="(company, index) in companies.data"
             v-bind:company="company"
             v-bind:index="index"
             v-bind:key="company.id"
	 		></store>
	 	</v-layout>
	 	<company-page></company-page>
  	 </v-container>

</template>

<script type="text/javascript">
	import store from '../../components/cards/store/store.vue'
	import homeBC from '../../components/breadcrumbs/store/homeBC.vue'
  	import companyPage from '../../components/pagination/companyPage.vue'


	export default {

		components: {
			store, homeBC, companyPage
		},
		computed: {

			companies(){

				return this.$store.getters.companies
			}
		}
	}
</script>