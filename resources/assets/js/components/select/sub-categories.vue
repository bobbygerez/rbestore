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
              label="Sub-categories"
              autocomplete
              item-value="id"
              item-text="name"
              @click="changeSubCategory"
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
            axios.post(api_further_categories,{
              subcategoryIds: this.subcategory
            })
            .then( function(response){
                
            })
            .catch( function(error){


            })
        }
    }
  }
</script>