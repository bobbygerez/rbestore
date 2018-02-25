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
                 <!-- <v-flex xl5 lg5 md5 sm5 xs5>

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
                  <v-icon dark>remove_circle </v-icon>
                </v-btn>
              </v-flex> -->

              <v-data-table
              v-bind:headers="headers"
              :items="cart"
              hide-actions
              flat
              >
              <template slot="items" slot-scope="props">
                <td class="text-lg-center text-md-center text-sm-center text-xs-center">
                  <v-avatar
                  class="grey lighten-4 ma-1"
                  :size="'70px'"
                  :tile="true"
                  >

                  <img :src="props.item.item.images[0].path" alt="avatar">
                </v-avatar>
                <div >
                  <span  v-for="(color, key) in props.item.item.colors" v-if="color.id === props.item.colorId">
                    {{ color.name}} 
                  </span>
                  <span v-for="(size, key) in props.item.item.sizes" v-if="size.id === props.item.sizeId">
                    {{ ' - ' + size.name}} 
                  </span>
                </div>
              </td>
             
              <td>{{ props.item.quantity }}</td>
              <td>{{ props.item.item.amount }}</td>
              <td>
                <v-btn icon small class="red--text mt-3" @click.native="remove(props.index)">
                  <v-icon dark>remove_circle</v-icon>
                </v-btn>
              </td>
            </template>
            <template slot="footer">
              <td>
                &nbsp;
              </td>
              <td class="subheading">
                TOTAL: 
              </td>
              <td class="py-3 subheading">
                &#8369;  {{ cartTotal }}
              </td>
              <td>
                &nbsp;
              </td>
            </template>
          </v-data-table>
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


  import cartTable from '../data-tables/cartTable.vue'

  export default {
    data: () => ({
      headers: [
          {
            text: 'Image',
            align: 'left',
            sortable: false,
            value: 'img'
          },
          { 
            text: 'Qty', 
            value: 'qty',
            align: 'left',
            sortable: false,
          },
          { 
            text: 'Price', 
            value: 'price',
            align: 'left',
            sortable: false, 
          },
          { 
            text: 'Remove', 
            value: 'remove',
            align: 'left',
            sortable: false, 
          }
        ],
      fav: true,
      menu: false,
      message: false,
      hints: true,
    }),
    components: {
      cartTable
    },
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
        

        this.$store.dispatch('newCart', cleanArray)
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