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
       <p  class="headline mt-0 text-lg-center" >Displaying from {{ fromm }} to  {{ to }} out of {{ total }} </p>
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
      fromm(){
        return this.$store.getters.from
      },
      to(){
        return this.$store.getters.to
      },
      total(){
        return this.$store.getters.total
      }

    }
  }
</script>