<template>
  <v-card color="grey lighten-4" flat class="p-0  m-0">
    <v-card-text class="pt-0  mt-0">
      <v-container class="pt-0 mt-0">
        <v-layout>
          <v-flex>
            <v-select
               prepend-icon="queue"
              v-bind:items="provinces"
              v-model="province"
              label="Select Province"
              autocomplete
              item-value="id"
              item-text="provDesc"
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