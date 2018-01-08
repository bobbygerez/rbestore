<template>
  <div class="text-xs-center">
    <v-menu
      top
      offset-y
      :close-on-content-click="false"
      :nudge-width="200"
      v-model="menu"
    >
      <v-btn color="error" dark slot="activator">Buy Now</v-btn>
      <v-card>
        <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          <p-colors></p-colors>
        </v-card-text>
        <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          <p-size></p-size>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="menu = false">Cancel</v-btn>
          <v-btn color="primary" flat @click="menu = false">Add Cart</v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
  </div>
</template>
<script>
 import pColors from '../../components/select/colors/selectColors.vue'
 import pSize from '../../components/select/sizes/selectSize.vue'
  export default {
    components: {
      pColors, pSize
    },
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