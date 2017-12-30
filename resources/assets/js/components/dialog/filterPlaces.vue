<template>
	<v-dialog v-model="filterPlaces" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          Filter Places
        </v-card-title>
        <v-form v-model="valid" ref="form" lazy-validation>
        <v-container grid-list-sm class="pa-4">
          <v-layout row wrap>
            <v-flex xs12>
              <province></province>
            </v-flex>
            <v-flex xs12>
              <subCategories></subCategories>
            </v-flex>
            <v-flex xs12>
              <furtherCategories></furtherCategories>
            </v-flex>

          </v-layout>
        </v-container>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat  @click="dialogCancel">Close</v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
</template>

<script type="text/javascript">
	import province from '../../components/select/places/province.vue'
	import city from '../../components/select/places/city.vue'
	import furtherCategories from '../../components/select/further-categories.vue'
	export default {

		data: () =>({

			  valid: true,
		}),
		 components: {
		     province,subCategories, furtherCategories
		    },

		 computed: {

		 	filterPlaces: {
        get(){
          return this.$store.getters.filterPlaces
        },
        set(){
          this.$store.dispatch('filterPlaces', false);
        }
		 		
		 	},
		 },

		 methods: {

		 	 dialogCancel(){
          		this.$store.dispatch('filterPlaces', false);
		      }
		      
		 }

		
	}
</script>