<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex>
            <v-select
              prepend-icon="pin_drop"
              v-bind:items="cities"
              v-model="city"
              multiple 
              label="Select City"
              autocomplete
              item-value="citymunCode"
              item-text="citymunDesc"
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
        city: null,
        
      }
    },
    computed: {
        cities(){

            return this.$store.getters.cities
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
        city(){
          let data = this
          this.$store.dispatch('cityId', this.city)
          axios.post(api_brgy + '/city',{
            cityId: this.city,
            categoryId: this.categoryId,
            subcategoryId: this.subcategoryId,
            furtherCatId: this.furtherCatId
          }).then((response) => {
            data.$store.dispatch('products', response.data.items)
            data.$store.dispatch('brgys', response.data.brgys)
          })

          .catch()

        }
    }
  }
</script>