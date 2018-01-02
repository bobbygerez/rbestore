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
    created(){
      this.$store.dispatch('productCurrentPage', 1)
    },
    computed: {
        categories(){

            return this.$store.getters.categories
        },
        provinceId(){
            return this.$store.getters.provinceId
        },
        cityId(){
            return this.$store.getters.cityId
        },
        brgyId(){
            return this.$store.getters.brgyId
        }
    },
    watch: {
        categoryId(){

          let data = this
          this.$store.dispatch('categoryId', this.categoryId)
          axios.post(api_categories + '/selection',{
              categoryId: this.categoryId,
              provinceId: this.provinceId,
              cityId: this.cityId,
              brgyId: this.brgyId
          })
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

        }
    }
  }
</script>