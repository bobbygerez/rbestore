<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex xs12 sm4 >
            <v-subheader v-text="'City'"></v-subheader>
          </v-flex>
          <v-flex xs12 sm8>
            <v-select

              v-bind:items="provinces"
              v-model="province"
              multiple 
              label="Select"
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