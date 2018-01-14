<template>
  <v-card color="white" flat class="ma-0 pa-0">
    <v-card-text class="ma-0 pa-0">
      <v-container fluid class="ma-0 pa-0">
        <v-layout row wrap class="ma-0 pa-0">
          <v-flex xs12 sm12>
            <v-select
              label="Select Color"
              v-bind:items="colors"
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
                  @input="clearSelected"
                  :selected="data.selected"
                  class="chip--select-multi"
                  :key="JSON.stringify(data.item)"
                >
                  <v-avatar>
                    <img :src="base + data.item.images[0].path">
                  </v-avatar>
                  {{ data.item.name }}
                </v-chip>
              </template>
              <template slot="item" slot-scope="data">
                <template v-if="typeof data.item !== 'object'">
                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                </template>
                <template v-else>
                  <v-list-tile-avatar>
                    <img v-bind:src="base + data.item.images[0].path"/>
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                    <v-list-tile-sub-title v-html="data.item.group"></v-list-tile-sub-title>
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
    data () {

      return {
        base: null,
        selectedColor: null
      }
    },
    created(){
      this.base = window.base;
    },
    computed: {
        colors(){
          return this.$store.getters.productDetails.colors
        }
    },
    methods: {
      clearSelected(){
        this.selectedColor = null
      }
    }
  }
</script>