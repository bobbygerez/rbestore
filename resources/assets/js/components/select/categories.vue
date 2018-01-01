<template>
  <v-card color="grey lighten-4" flat >
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          
          <v-flex xs12 sm12>
            <v-select
              prepend-icon="queue"
              v-bind:items="categories"
              v-model="categoryId"
              label="Select Category"
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
    
     data() {
      return {
        categoryId: null,
        
      }
    },
    computed: {
        categories(){

            return this.$store.getters.categories
        }
    },
    watch: {
        categoryId(){

          let data = this
          this.$store.dispatch('categoryId', this.categoryId)
          axios.get(api_categories + '/' + this.categoryId + '/subcategories')
          .then( function(response){
              data.$store.dispatch('subcategories', response.data.subcategories)
              data.$store.dispatch('products', response.data.items)
              data.$store.dispatch('breadCrumbsItems', [
              {
                text: 'Home',
                to: '/',
                disabled: false
              },
              {
                text: response.data.category.name,
                to: response.data.category.name,
                disabled: false
              },
              ])
          })
          .catch( function(error){


          })
        }
    }
  }
</script>