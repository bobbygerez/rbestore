
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
    
    created(){
      this.$store.dispatch('user_current_page', 1)
    },
    computed: {
      currentPage: {

        get(){
          return this.$store.getters.products.current_page
        },
        set(val){

          this.$store.dispatch('productCurrentPage', val)
        }
      },
      lastPage(){
        return this.$store.getters.products.last_page
      },
      products(){
        return this.$store.getters.products
      },
      subcategory(){
        return this.$store.getters.subcategoryId
      },
      furtherCatId(){
        return this.$store.getters.furtherCatId
      },
      categoryId(){
        return this.$store.getters.categoryId
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
      currentPage(){
        let data = this

        if(this.products.path === 'http://localhost/rbestore/public/api/further_categories'){
          axios.post(this.products.path + '?page=' + this.currentPage,{
             subcategoryIds: this.subcategory
          })
          .then( function(response){
               data.$store.dispatch('products', response.data.items);
          })
          .catch( function(error){


          })
        }
        else if (this.products.path === 'http://localhost/rbestore/public/api/items/further_categories'){
           axios.post(this.products.path + '?page=' + this.currentPage,{
                furtherCatId: this.furtherCatId
              })
              .then( function(response){
                  data.$store.dispatch('products', response.data.items)
                  data.$store.dispatch('furtherCatBreadCrumbs', response.data.further_categories)
              })
              .catch( function(error){


              })
        }
        else if(this.products.path === 'http://localhost/rbestore/public/api/categories/selection'){
           axios.post(api_categories + '/selection' + '?page=' + this.currentPage,{
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
        else{
          axios.get(this.products.path + '?page=' + this.currentPage)
          .then( function(response){
               data.$store.dispatch('products', response.data.items);
          })
          .catch( function(error){


          })
        }
        
      }
    }
  }
</script>