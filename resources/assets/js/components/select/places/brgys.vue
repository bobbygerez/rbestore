<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex>
            <v-select
              prepend-icon="drag_handle"
              v-bind:items="brgys"
              v-model="brgy"
              multiple 
              label="Select Barangay"
              autocomplete
              item-value="brgyCode"
              item-text="brgyDesc"
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
        brgy: null,
        
      }
    },
    computed: {
        brgys(){

            return this.$store.getters.brgys
        },
        categoryId(){

            return this.$store.getters.categoryId
        },
        subcategoryId(){
            return this.$store.getters.subcategoryId
        },
        furtherCatId(){
            return this.$store.getters.furtherCatId
        }
    },
    watch: {
        brgy(){
          let data = this
          this.$store.dispatch('brgyId', this.brgy)
          axios.post(api_brgy + '/items',{
            brgyId: this.brgy,
            categoryId: this.categoryId,
            subcategoryId: this.subcategoryId,
            furtherCatId: this.furtherCatId
          }).then((response) => {
            
             data.$store.dispatch('products', response.data.items)
             
          })

          .catch()

          
        }
    }
  }
</script>