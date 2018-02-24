<template>
  <v-card color="white" flat class="ma-0 pa-0">
    <v-card-text class="ma-0 pa-0">
      <v-container fluid class="ma-0 pa-0">
        <v-layout row wrap class="ma-0 pa-0">
          <v-flex xs12 sm12>
            <v-select
              label="Select Size"
              v-bind:items="product.sizes"
              v-model="selectedSize"
              item-text="name"
              item-value="id"
              chips
              max-height="auto"
              autocomplete
            >
              <template slot="selection" slot-scope="data">
                <v-chip
                  close
                  @input="clearSelectedSize"
                  :selected="data.selected"
                  :key="JSON.stringify(data.item)"
                >
                  {{ data.item.name }}
                </v-chip>
              </template>
              
            </v-select>
          </v-flex>
        </v-layout>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    props: ['product'],
    data () {
      return {
        selectedSize: null
      }
    },
    computed: {
      sizes(){
        return this.$store.getters.productDetails.sizes
      }
    },
    methods: {
      clearSelectedSize(){
        this.selectedSize = null
      }
    },
    watch: {
      selectedSize(){
        this.$store.dispatch('selectedSizeId', this.selectedSize)
      }
    }
  }
</script>