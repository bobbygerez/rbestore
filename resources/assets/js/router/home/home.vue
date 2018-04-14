<template>
	 <v-container fluid grid-list-md>
	     <product-bread-crumbs></product-bread-crumbs>
          <v-layout row wrap>
              <product
                 v-for="(product, index) in products.data"
                  v-bind:item="product"
                  v-bind:index="index"
                  v-bind:key="product.id"
                   
              >
              </product>

          </v-layout>
      <product-page></product-page>
   </v-container>

</template>

<script type="text/javascript">

  import productBreadCrumbs from '../../components/breadcrumbs/home/product-breadcrumbs.vue'
  import productPage from '../../components/pagination/productPage.vue'
  import product from '../../components/cards/product.vue'
  import axios from 'axios'
   export default {
      components: {
        productBreadCrumbs, productPage, product
      },
      created(){
        this.home()
        
      },
      computed: {

        products(){
          return this.$store.getters.products
        },
      },
      methods: {

          home(){
              let data = this
              data.$store.dispatch('breadCrumbsItems',[
                    {
                      text: 'Home',
                      to: '/',
                      disabled: false
                    },
                    {
                      text: data.$route.params.cat,
                      to: data.$route.params.cat,
                      disabled: false
                    }
                  ])
              axios.get(api_startup)
              .then( function(response){

                  data.$store.dispatch('categories', response.data.categories);
                  data.$store.dispatch('companies', response.data.companies);
                  data.$store.dispatch('provinces', response.data.provinces);
                  data.$store.dispatch('products', response.data.items);

                  
              })
              .catch( function(error){

                  // return this.router.push(window.location.href)

              })
          }
      }

   }
</script>