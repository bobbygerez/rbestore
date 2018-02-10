<template>
   <v-layout row wrap>
    
    <v-flex xs12>
    <v-breadcrumbs>
      <v-icon slot="divider">chevron_right</v-icon>
      <v-breadcrumbs-item 
        :to="'/'"
        :exact="true"
      >
      Home
      </v-breadcrumbs-item>
    </v-breadcrumbs>
       <p  class="headline mt-0 text-lg-center" >Displaying from {{ companies.from }} to  {{ companies.to }} out of {{ companies.total }} </p>
    </v-flex>
  </v-layout>
</template>
<script>
  export default {
    computed: {
      companies(){
        return this.$store.getters.companies
      }

    }
  }
</script>     