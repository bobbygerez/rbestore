<template>
   <v-layout row wrap>
    
    <v-flex xs12>
    <v-breadcrumbs>
      <v-icon slot="divider">chevron_right</v-icon>
      <v-breadcrumbs-item 
        v-for="item in breadCrumbsItems" :key="item.text"
        :disabled="item.disabled"
        :to="item.to"
        :exact="true"
      >
        {{ item.text }}
      </v-breadcrumbs-item>
    </v-breadcrumbs>
       <p  class="headline mt-0 text-lg-center" >Displaying from {{ products.from }} to  {{ products.to }} out of {{ products.total }} </p>
    </v-flex>
  </v-layout>
</template>
<script>
  export default {
    data () {
      return {
        
      }
    },
    computed: {
      breadCrumbsItems(){
        return this.$store.getters.breadCrumbsItems
      },
      products(){
        return this.$store.getters.products
      }

    }
  }
</script>