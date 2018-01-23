<template>
  <v-stepper v-model="e6" vertical>
    <h2 class="headline ma-3 pb-0">Shopping Cart</h2>
    <v-stepper-step step="1" v-bind:complete="e6 > 1" class="pt-0">
      Review your product
    </v-stepper-step>
    <v-stepper-content step="1">
      <v-card class="mb-5" height="200px" color="grey lighten-1">
        <v-container>
          <v-layout>
            <v-flex xl5 lg5 md5 sm5 xs5>
              Product
            </v-flex>
            <v-flex xl2 lg2 md2 sm2 xs2>
              C/S
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              Qty
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              Remove
            </v-flex>
          </v-layout>
          <v-layout v-for="(item, key) in cart" :key="key">
            <v-flex xl5 lg5 md5 sm5 xs5>
              <v-avatar
                class="grey lighten-4"
                :size="'200px'"
              >
                <img :src="item.item.images[0].path" alt="avatar">
              </v-avatar>
            </v-flex>
            <v-flex xl2 lg2 md2 sm2 xs2>
              C/S
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              Qty
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              Remove
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
      <v-btn color="primary" @click.native="e6 = 2">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
    <v-stepper-step step="2" v-bind:complete="e6 > 2">Apply Discount Code</v-stepper-step>
    <v-stepper-content step="2">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click.native="e6 = 3">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
    <v-stepper-step step="3" v-bind:complete="e6 > 3">Delivery Details</v-stepper-step>
    <v-stepper-content step="3">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click.native="e6 = 4">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
    <v-stepper-step step="4">Payment Methods</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click.native="e6 = 1">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
  </v-stepper>
</template>

<script>
  export default {
    data () {
      return {
        e6: 1
      }
    },
    computed: {

      cart(){
        return this.$store.getters.cart
      }
    }
  }
</script>