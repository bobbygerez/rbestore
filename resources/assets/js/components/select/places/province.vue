<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex>
            <v-select
               prepend-icon="place"
              v-bind:items="provinces"
              v-model="province"
              label="Select Province"
              autocomplete
              item-value="provCode"
              item-text="provDesc"
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
        province: null,
        
      }
    },
    computed: {
        provinces(){

            return this.$store.getters.provinces
        },
        provinceId(){
            return this.$store.getters.provinceId
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
        province(){

          let data = this
          this.$store.dispatch('provinceId', this.province)
          axios.post(api_city + '/province',{
              provinceId: this.province,
              categoryId: this.categoryId,
              subcategoryId: this.subcategoryId,
              furtherCatId: this.furtherCatId
          }).then((response)=>{

            data.$store.dispatch('cities', response.data.cities)
            data.$store.dispatch('products', response.data.items)

          })

          .catch((response) => {

          })

        }
    }
  }
</script>