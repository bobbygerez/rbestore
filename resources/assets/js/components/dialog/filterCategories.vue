<template>
	<v-dialog v-model="filterCategories" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          Filter Categories
        </v-card-title>
        <v-form v-model="valid" ref="form" lazy-validation>
        <v-container grid-list-sm class="pa-4">
          <v-layout row wrap>
            <v-flex xs12>
              <categories></categories>
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
          <v-btn flat  @click="dialogCancel">Cancel</v-btn>
          <v-btn flat @click="submit" class="blue--text text--darken-3">submit</v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
</template>

<script type="text/javascript">
	import categories from '../../components/select/categories.vue'
	import subCategories from '../../components/select/sub-categories.vue'
	import furtherCategories from '../../components/select/further-categories.vue'
	export default {

		data: () =>({

			  valid: true,
		}),
		 components: {
		     categories,subCategories, furtherCategories
		    },

		 computed: {

		 	filterCategories: {
        get(){
          return this.$store.getters.filterCategories
        },
        set(){
          this.$store.dispatch('filterCategories', false);
        }
		 		
		 	},
		 },

		 methods: {

		 	 dialogCancel(){
          		this.$store.dispatch('filterCategories', false);
		      },
		      submit(){

		      }
		      
		 }

		
	}
</script>