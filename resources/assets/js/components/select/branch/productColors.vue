<template>
  <v-card color="white" flat class="ma-0 pa-0">
    <v-card-text class="ma-0 pa-0">
      <v-container fluid class="ma-0 pa-0">
        <v-layout row wrap class="ma-0 pa-0">
          <v-flex xs12 sm12>
            <v-select
              label="Select Color"
              v-bind:items="product.colors"
              v-model="selectedColor"
              item-text="name"
              item-value="id"
              chips
              max-height="auto"
              autocomplete
            >
              <template slot="selection" slot-scope="data">
                <v-chip
                  close
                  :selected="data.selected"
                  @input="clearSelected"
                  class="chip--select-multi"
                  :key="JSON.stringify(data.item)"
                >
                  <v-avatar>
                    <img :src="base + data.item.images">
                  </v-avatar>
                  {{ data.item.name}}
                </v-chip>
              </template>
              <template slot="item" slot-scope="data">
                <template v-if="typeof data.item !== 'object'">
                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                </template>
                <template v-else>
                  <v-list-tile-avatar>
                    <img v-bind:src="base + data.item.images"/>
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                  </v-list-tile-content>
                </template>
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
        base: null,
        selectedColor: null
      }
    },
    created(){
      this.base = window.base;
    },
    methods: {
      clearSelected(){
        this.selectedColor = null
      }
    },
    watch: {
      selectedColor(){
        this.$store.dispatch('selectedColorId', this.selectedColor)
      }
    }
  }
</script>