<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex xs12 sm12>
            <v-select
              prepend-icon="add_box"
              v-bind:items="subcategories"
              v-model="subcategory"
              multiple 
              label="Select Sub-categories"
              autocomplete
              item-value="id"
              item-text="name"
            ></v-select>
          </v-flex>
        </v-layout>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>

  import axios from 'axios'
  export default {
    data () {
      return {
        subcategory: null,
        
      }
    },
    computed: {
        subcategories(){

            return this.$store.getters.subcategories
        },
        categoryId(){

            return this.$store.getters.categoryId
        }

    },
    watch: {
        subcategory(){

            let data = this
            this.$store.dispatch('subcategoryId', this.subcategory)
            axios.post(api_further_categories,{
              subcategoryIds: this.subcategory
            })
            .then( function(response){
                
                data.$store.dispatch('furtherCategories', response.data.furtherCategories)
                data.$store.dispatch('products', response.data.items)
                data.$store.dispatch('subCatBreadCrumbs', response.data.subcategories)
               
                

            })
            .catch( function(error){


            })
        }
    }
  }
</script>