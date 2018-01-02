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
    created(){
      this.$store.dispatch('productCurrentPage', 1)
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

              if (this.subcategory.length > 0) {

                axios.post(api_further_categories, {
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
            else {

                axios.get(api_categories + '/' + this.categoryId + '/subcategories')
                .then( function(response){
                    data.$store.dispatch('subcategories', response.data.subcategories)
                    data.$store.dispatch('products', response.data.items)
                    data.$store.dispatch('breadCrumbsItems', [
                    {
                      text: 'Home',
                      to: '/',
                      disabled: true
                    },
                    {
                      text: response.data.category.name,
                      to: response.data.category.name,
                      disabled: true
                    },
                    ])
                    
                })
                .catch( function(error){


                })
                data.$store.dispatch('furtherCategories', [])
            }
            
        }
    }
  }
</script>