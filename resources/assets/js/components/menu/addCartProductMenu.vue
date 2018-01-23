<template>
  <div class="text-xs-center">
    <v-menu
      top
      offset-y
      :close-on-content-click="false"
      :nudge-width="200"
      v-model="menu"
    >
      <v-btn color="error" dark slot="activator" @click="cancel">Buy Now</v-btn>
      <v-card>
        <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          <p-colors ref="selectedColor"></p-colors>
        </v-card-text>
        <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          <p-size ref="selectedSize"></p-size>
        </v-card-text>
         <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          <cart-quantity></cart-quantity>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="cancel">Cancel</v-btn>
          <v-btn color="primary" flat @click="addCart">Add Cart</v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
    
  </div>
</template>
<script>
 import pColors from '../../components/select/colors/selectColors.vue'
 import pSize from '../../components/select/sizes/selectSize.vue'
 import cartQuantity from '../../components/textfield/cartQuantity.vue'
  export default {
    components: {
      pColors, pSize, cartQuantity
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
        },
        selectedColorId(){
          return this.$store.getters.selectedColorId
        },
        selectedSizeId(){
          return this.$store.getters.selectedSizeId
        },
        quantity(){
          return this.$store.getters.cartQuantity
        }
    },
    methods: {
      cancel(){
        this.menu = false
        this.$store.dispatch('selectedColorId', null);
        this.$store.dispatch('selectedSizeId', null);
        this.$store.dispatch('cartQuantity', 1);
        this.$refs.selectedColor.clearSelected();
        this.$refs.selectedSize.clearSelectedSize();
      },
      addCart(){
        this.$store.dispatch('cart', { 

            'item': this.item,
            'colorId': this.selectedColorId,
            'sizeId': this.selectedSizeId,
            'quantity': this.quantity

          })
        this.$store.dispatch('cartSnackBar', true)
        this.cancel()
      }
    }
  }
</script>