
<template>
  <div class="text-xs-center" >
    <v-container>
      <v-layout justify-center>
        <v-flex>
          <v-card flat>
            <v-card-text>
              <v-pagination v-bind:length.number="lastPage" :total-visible="8" v-model="currentPage" class="ma-0"></v-pagination>
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
      currentPage: {

        get(){
          return this.$store.getters.user_current_page
        },
        set(val){

          this.$store.dispatch('user_current_page', val)
        }
      },
      lastPage(){
        return this.$store.getters.userProduct.last_page
      }
    },
    watch: {
      currentPage(){
        let data = this
         axios.get(api_user + this.$route.params.uuid + '?page=' + this.currentPage)
        .then( function(response){
             data.$store.dispatch('userProduct', response.data.items);
        })
        .catch( function(error){


        })
      }
    }
  }
</script>