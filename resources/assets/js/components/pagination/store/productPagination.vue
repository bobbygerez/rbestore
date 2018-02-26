
<template>
  <div class="text-xs-center" >
    <v-container>
      <v-layout>
        <v-flex>
          <v-card flat>
            <v-card-text>
              <v-pagination v-bind:length.number="branchProducts.last_page" :total-visible="8" v-model="branchProducts.current_page" class="ma-0"></v-pagination>
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
      branchProducts(){
        return this.$store.getters.branchProducts
      }
    },
    watch: {
      'branchProducts.current_page':function(newVal, oldVal){
           let data = this
            let branchProduct = this.$route.params.branchProduct
            axios.get(window.base + '/api/company/' + branchProduct + '/' + newVal)
            .then(function(response){
              data.$store.dispatch('branchProducts', response.data.brancProducts)
              
            })
            .catch()
          
      }
    }
  }
</script>