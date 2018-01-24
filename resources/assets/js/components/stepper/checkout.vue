<template>
  <v-stepper v-model="e6" vertical>
    <details-b-c></details-b-c>
    <h2 class="display-1 ma-3 pb-0">Shopping Cart</h2>
    <v-stepper-step step="1" v-bind:complete="e6 > 1" class="pt-0">
      Review your product
    </v-stepper-step>
    <v-stepper-content step="1">
      <v-card-text class="mb-5" height="200px">
        <v-container>
          <v-layout>
            <v-flex xl4 lg4 md4 sm4 xs4>
              <h3 class="title">Product</h3>
            </v-flex>
            <v-flex xl3 lg3 md3 sm3 xs3>
              <h3 class="title">Color - Size</h3>
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              <h3 class="title">Qty</h3>
            </v-flex>
            <v-flex xl2 lg2 md2 sm2 xs2>
              <h3 class="title">Price</h3>
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              <h3 class="title"  >Remove</h3>
            </v-flex>
          </v-layout>
          <v-layout v-for="(item, key) in cart" :key="key" class="ma-1">
            <v-flex xl4 lg4 md4 sm4 xs4>
              <v-avatar
                class="grey lighten-4"
                :size="'150px'"
                :tile="true"
              >
                <img :src="item.item.images[0].path" alt="avatar">
              </v-avatar>
            </v-flex>
            <v-flex xl3 lg3 md3 sm3 xs3>
              <div class="mt-5 pt-3">
               <span  class="subheading" v-for="(color, key) in item.item.colors" v-if="color.id === item.colorId">
                            {{ color.name}} 
                </span>
                   
                <span class="subheading " v-for="(size, key) in item.item.sizes" v-if="size.id === item.sizeId">
                            {{ ' - ' + size.name}} 
              </span>
              </div>
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
              <p class="subheading mt-5 pt-3">{{ item.quantity }}</p>
            </v-flex>
            <v-flex xl2 lg2 md2 sm2 xs2>
              <p class="subheading mt-5 pt-3">{{ item.item.amount }}</p>
            </v-flex>
             <v-flex xl2 lg2 md2 sm2 xs2>
             <div class="mt-4 pt-4">
              <v-btn icon small class="red--text" ref="removeItem" @click.native="remove(key)">
                        <v-icon dark>remove_circle</v-icon>
               </v-btn>
              </div>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-text>
      <v-btn color="primary" @click.native="e6 = 2">Continue</v-btn>
    </v-stepper-content>
    <v-stepper-step step="2" v-bind:complete="e6 > 2">Apply Discount Code</v-stepper-step>
    <v-stepper-content step="2">
      <v-card color="grey lighten-1" class="mb-5" height="200px">
        
      </v-card>
      <v-btn color="primary" @click.native="e6 = 3">Continue</v-btn>
      <v-btn flat @click.native="e6 = 1">Previous</v-btn>
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
  import detailsBC from '../../components/breadcrumbs/detailsBC.vue'
  export default {
    data () {
      return {
        e6: 1
      }
    },
    created(){
      this.$store.dispatch('navBreadCrumbs', [
              {
                text: 'Home',
                to: '/',
                disabled: false
              },
              {
                text: 'Checkout',
                disabled: false,
              }])
    },
    components: {
      detailsBC
    },
    computed: {

      cart(){
        return this.$store.getters.cart
      }
    },
    methods: {
      remove(key){
        this.$store.dispatch('removeCartItem', key)
      }
    }
  }
</script>