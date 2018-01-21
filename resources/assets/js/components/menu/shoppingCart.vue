<template>
    <v-menu
      offset-x
      offset-y
      left
      :close-on-content-click="false"
      :nudge-width="330"
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
      <v-card>
        
          <v-card-text >
            <v-container class="ma-0 pa-0">
               <v-layout class="text-xs-left ">
                  <v-flex xl6 lg6 md6>
                     <h2 class="subheading">Product</h2>
                  </v-flex>
                  <v-flex xl2 lg2 md2>
                     <h2 class="subheading">Qty</h2>
                  </v-flex>
                  <v-flex xl3 lg3 md3>
                     <h2 class="subheading">Price</h2>
                  </v-flex>
                  <v-flex xl1 lg1 md1>
                     <h2 class="subheading">Remove</h2>
                  </v-flex>
               </v-layout>
               <v-layout v-for="(item, key) in cart" :key="key" class="text-xs-left ">
                   <v-flex xl6 lg6 md6>
                    <v-avatar
                      class="grey lighten-4"
                    >
                      <img :src="item.item.images[0].path" alt="avatar">
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
                   <v-flex xl2 lg2 md2>
                      <h3 class="subheading mt-3 ml-3">{{ item.quantity }}</h3>
                   </v-flex>
                   <v-flex xl3 lg3 md3>
                      <h3 class="subheading mt-3 ml-3">{{ item.item.amount }}</h3>
                   </v-flex>
                   <v-flex xl1 lg1 md1>
                     <v-btn outline fab small color="error">
                        <v-icon dark>remove</v-icon>
                      </v-btn>
                  </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>
         <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="menu = false">Cancel</v-btn>
          <v-btn color="primary" flat @click="menu = false">Save</v-btn>
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
      totalItems(){
        return this.$store.getters.totalItems
      },
      cart(){
        var cart  = this.$store.getters.cart
        if (cart != null) {
          return cart
        }
        return []
        
      }
    },
    methods: {
      add(){

      },
      subtract(){

      }
    }
  }
</script>