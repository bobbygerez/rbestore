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
      navBreadCrumbs(){
        return this.$store.getters.navBreadCrumbs
      },
      user(){
        return this.$store.getters.users
      }
      

    }
  }
</script>