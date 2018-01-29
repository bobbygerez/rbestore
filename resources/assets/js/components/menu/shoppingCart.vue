<template>
    <v-menu
      offset-x
      offset-y
      left
      :close-on-content-click="false"
      :nudge-width="310"
      v-model="menu"
    >
    
      <v-btn icon flat dark slot="activator">
        <v-badge left
          color="green"
          v-model="totalItems"
        >
         <span slot="badge">{{ totalItems }}</span>
        </v-badge>
      <v-icon>shopping_cart</v-icon></v-btn>
      <v-card v-if="cartTotal != null">
        
          <v-card-text >
            <v-container class="ma-0 pa-0">
               <v-layout class="text-xs-left ">
                  <v-flex xl5 lg5 md5 sm5 xs5>
                     <h2 class="subheading">Product</h2>
                  </v-flex>
                  <v-flex xl2 lg2 md2 sm2 xs2>
                     <h2 class="subheading">Qty</h2>
                  </v-flex>
                  <v-flex xl3 lg3 md3 sm3 xs3>
                     <h2 class="subheading">Price</h2>
                  </v-flex>
                  <v-flex xl1 lg1 md1 sm1 xs1>
                     <h2 class="subheading">Remove</h2>
                  </v-flex>
               </v-layout>
               <v-layout v-for="(item, key) in cart" :key="key" class="text-xs-left ">
                   <v-flex xl5 lg5 md5 sm5 xs5>
                    
                        <v-avatar
                          class="grey lighten-4"
                          size="62px"
                        >
                        <img :src="item.item.images[0].path" alt="avatar" >
                        </v-avatar>
                      
                    <br />
                    <span class="grey--text" v-for="(color, key) in item.item.colors" v-if="color.id === item.colorId">
                            {{ color.name}} 
                      </span>
                     -
                      <span class="grey--text" v-for="(size, key) in item.item.sizes" v-if="size.id === item.sizeId">
                            {{ size.name}} 
                      </span>
                    
                   </v-flex>
                   <v-flex xl2 lg2 md2 sm2 xs2>
                      <h3 class="subheading mt-3 ml-1">{{ item.quantity }}</h3>
                   </v-flex>
                   <v-flex xl3 lg3 md3 sm3 xs3>
                      <h3 class="subheading mt-3 ml-1">{{ item.item.amount }}</h3>
                   </v-flex>
                   <v-flex xl1 lg1 md1 sm1 xs1>
                     <v-btn icon small class="red--text mt-3" @click.native="remove(key)">
                        <v-icon dark>remove_circle</v-icon>
                    </v-btn>
                  </v-flex>
                  
              </v-layout>
              <v-layout>
                  <v-flex xl12 lg12 md12 sm12 xs12 offset-xl4 offset-lg4 offset-md4 offset-sm4 offset-xs4>
                       <p class="headline pt-2 borderTop grey--text ml-4" >&#8369; {{ cartTotal }}</p>
                  </v-flex>
                  
              </v-layout>
            </v-container>
          </v-card-text>
         <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="menu = false">Cancel</v-btn>
          <v-btn color="primary" flat to="/checkout" @click.native="checkOut">Checkout</v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
</template>
<script>
  export default {
    data: () => ({
      fav: true,
      menu: false,
      message: false,
      hints: true,
    }),
    computed: {
      totalItems: {
        get(){ return this.$store.getters.totalItems },
        set(){}
      },
      cartTotal(){
        return this.$store.getters.cartTotal
      },
      cart(){
        return this.$store.getters.cart
      }
    },
    methods: {
      add(){

      },
      subtract(){

      },
      remove(key){
        
        var cart = JSON.parse(localStorage.getItem('localCart'));
        delete cart[key]

        var cleanArray = [];
              for(var key in cart){
                if(cart[key] !== null || cart[key] !== undefined){
                  cleanArray.push(cart[key])
                }
              }

        if(cleanArray.length > 0){
          localStorage.setItem('localCart', JSON.stringify(cleanArray));
        }
        else {
          localStorage.setItem('localCart', null);
        }
        

        this.$store.dispatch('removeCartItem', key)
      },
      checkOut(){
        this.menu = false
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
      }
    }
  }
</script>

<style type="text/css">
  .borderTop {

    border-top: 2px solid black ;
  }
</style>