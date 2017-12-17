<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="p-0  m-0">
      <v-container class="p-0 m-0">
        <v-layout>
          <v-flex xs12 sm12>
            <v-select
              prepend-icon="drag_handle"
              v-bind:items="provinces"
              v-model="province"
              multiple 
              label="More Categories"
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
        province: null,
        
      }
    },
    computed: {
        provinces(){

            return this.$store.getters.provinces
        }
    },
    watch: {
        province(){


        }
    }
  }
</script>