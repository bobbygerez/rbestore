<template>
   <v-layout row wrap>
    
    
    <v-flex xs12>
    <v-breadcrumbs>
      <v-icon slot="divider">chevron_right</v-icon>
      <v-breadcrumbs-item 
        v-for="item in navBreadCrumbs" :key="item.text"
        :disabled="item.disabled"
        :to="item.to"
        :exact="true"
      >
        {{ item.text }}
      </v-breadcrumbs-item>

    </v-breadcrumbs>
    <public-profile></public-profile>
     <p  class="headline mt-0 text-lg-center" >Displaying from {{ userProduct.from }} to  {{ userProduct.to }} out of {{ userProduct.total }} </p>
    </v-flex>
    
  </v-layout>
</template>
<script>

  import publicProfile from '../menu/publicProfile.vue'

  export default {
    data () {
      return {
        
      }
    },
  components: {
    publicProfile
  },
    computed: {
      navBreadCrumbs(){
        return this.$store.getters.navBreadCrumbs
      },
      userProduct(){
        return this.$store.getters.userProduct
      }
      

    }
  }
</script>