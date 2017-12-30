<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="p-0  m-0">
      <v-container class="p-0 m-0">
        <v-layout>
          <v-flex xs12 sm12>
            <v-select
              prepend-icon="drag_handle"
              v-bind:items="furtherCategories"
              v-model="furtherCat"
              multiple 
              label="More Categories"
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
        furtherCat: null,
        
      }
    },
    computed: {
        furtherCategories(){

            return this.$store.getters.furtherCategories
        },
        subcategoryId(){
            return this.$store.getters.subcategoryId
        }
        
    },
    watch: {
        furtherCat(){

            let data = this

            if (this.furtherCat.length > 0) {

              axios.post(api_items_further_cat,{
                furtherCatId: this.furtherCat
              })
              .then( function(response){
                  data.$store.dispatch('products', response.data.items)
                  data.$store.dispatch('furtherCatBreadCrumbs', response.data.further_categories)
              })
              .catch( function(error){


              })
            }
            else {

              axios.post(api_further_categories,{
                subcategoryIds: this.subcategoryId
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
  }
</script>