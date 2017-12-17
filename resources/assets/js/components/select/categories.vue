<template>
  <v-card color="grey lighten-4" flat >
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          
          <v-flex xs12 sm12>
            <v-select
              prepend-icon="queue"
              v-bind:items="categories"
              v-model="category"
              label="Categories"
              autocomplete
              item-value="id"
              item-text="name"
            ></v-select>
          </v-flex>
        </v-layout>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        category: null,
        
      }
    },
    computed: {
        categories(){

            return this.$store.getters.categories
        }
    },
    watch: {
        province(){


        }
    }
  }
</script>