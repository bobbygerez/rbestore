<template>
	 <v-container fluid grid-list-md>
	 	 <home-b-c></home-b-c>
	 	 <v-layout row wrap>
	 		<companies
	 		 v-for="(company, index) in companies.data"
             v-bind:company="company"
             v-bind:index="index"
             v-bind:key="company.id"
	 		></companies>
	 	</v-layout>
	 	<company-page></company-page>
  	 </v-container>

</template>

<script type="text/javascript">
	import companies from '../../components/cards/store/companies.vue'
	import homeBC from '../../components/breadcrumbs/store/homeBC.vue'
  	import companyPage from '../../components/pagination/companyPage.vue'


	export default {

		components: {
			companies, homeBC, companyPage
		},
		computed: {

			companies(){

				return this.$store.getters.companies
			}
		}
	}
</script>