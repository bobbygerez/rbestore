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
        }
    },
    watch: {
        furtherCat(){

            let data = this
            axios.post(api_items,{
              furtherCatId: this.furtherCat
            })
            .then( function(response){
                
            })
            .catch( function(error){


            })

        }
    }
  }
</script>