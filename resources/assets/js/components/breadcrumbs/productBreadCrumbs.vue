<template>
   <v-layout row wrap>
    <v-flex xs4>
    <v-breadcrumbs>
      <v-icon slot="divider">chevron_right</v-icon>
      <v-breadcrumbs-item 
        v-for="item in items" :key="item.text"
        :disabled="item.disabled"
      >
        {{ item.text }}
      </v-breadcrumbs-item>
    </v-breadcrumbs>
    </v-flex>
    <v-flex xs8>
       <div  class="headline mt-3">Displaying from {{ fromm }} to  {{ to }} out of {{ total }} </div>
    </v-flex>
  </v-layout>
</template>
<script>
  export default {
    data () {
      return {
        items: [
          {
            text: 'Dashboard',
            disabled: false
          },
          {
            text: 'Link 1',
            disabled: false
          },
          {
            text: 'Link 2',
            disabled: true
          }
        ]
      }
    },
    computed: {

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