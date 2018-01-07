<template>
  <div class="text-xs-center">
    <v-menu
      top
      offset-y
      :close-on-content-click="false"
      :nudge-width="200"
      v-model="menu"
    >
      <v-btn color="error" dark slot="activator"><v-icon class="title">shopping_cart</v-icon> Add Cart</v-btn>
      <v-card>
        <v-list>
          <v-list-tile class="ma-0">
            <v-list-tile-content  class="ma-0">
              <v-list-tile-title class="title" center>Additional Information</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-list>
          <v-list-tile>
            <v-list-tile-action>
              <v-switch v-model="message" color="purple"></v-switch>
            </v-list-tile-action>
            <v-list-tile-title>Enable messages</v-list-tile-title>
          </v-list-tile>
          <v-list-tile>
            <v-list-tile-action>
              <v-switch v-model="hints" color="purple"></v-switch>
            </v-list-tile-action>
            <v-list-tile-title>Enable hints</v-list-tile-title>
          </v-list-tile>
        </v-list>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="menu = false">Cancel</v-btn>
          <v-btn color="primary" flat @click="menu = false">Add Now</v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
  </div>
</template>
<script>
  export default {
    props: ['item'],
    data: () => ({
      fav: true,
      menu: false,
      message: false,
      hints: true
    }),
    computed: {

        colors(){
          return this.$store.getters.productDetails.colors
        }
    }
  }
</script>