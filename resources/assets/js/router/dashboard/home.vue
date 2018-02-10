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

  import homeBC from '../../components/breadcrumbs/store/homeBC.vue'
  import productPage from '../../components/pagination/productPage.vue'
  import product from '../../components/cards/product.vue'


   export default {
      components: {
        productBreadCrumbs, productPage, product
      },
      created(){

        this.$store.dispatch('breadCrumbsItemsPush',{
          text: 'Home',
          disabled: false
        })
      },

      computed: {

        products(){
          return this.$store.getters.products
        },
      }

   }
</script>