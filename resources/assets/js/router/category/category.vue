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

  import productBreadCrumbs from '../../components/breadcrumbs/productBreadCrumbs.vue'
   import productPage from '../../components/pagination/productPage.vue'
    import product from '../../components/cards/product.vue'

   export default {
      components: {
        productBreadCrumbs, productPage, product
      },
      created(){
        this.$store.dispatch('breadCrumbsItems',[
            {
              text: 'Home',
              to: '/',
              disabled: false
            },
            {
              text: this.$route.params.cat,
              to: this.$route.params.cat,
              disabled: false
            }
          ])
      },
      computed: {

        products(){
          return this.$store.getters.products
        },
      }

   }
</script>