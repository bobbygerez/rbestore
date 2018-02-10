<template>
  <div class="text-xs-center" >
    <v-container>
      <v-layout justify-center>
        <v-flex>
          <v-card flat>
            <v-card-text>
              <v-pagination v-bind:length.number="companies.last_page" :total-visible="8" v-model="companies.current_page" class="ma-0" color="grey darken-2"></v-pagination>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    computed: {
      companies() {
        return this.$store.getters.companies
      }
    },
    watch: {
      'companies.current_page':function(newVal, oldVal){
            let data = this
            this.$store.dispatch('companiesCurrentPage', newVal)
            axios.get(api_startup + '?page=' + newVal)
            .then( function(response){
              data.$store.dispatch('companies', response.data.companies);
            })
            .catch( function(error){


            })
          
      }
    }
  }
</script>