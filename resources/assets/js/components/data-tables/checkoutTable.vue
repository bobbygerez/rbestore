<template>
  <v-data-table
      v-bind:headers="headers"
      :items="cart"
      hide-actions
      class="elevation-1"
    >
    <template slot="items" slot-scope="props">
      <td>
        <v-avatar
                class="grey lighten-4"
                :size="'150px'"
                :tile="true"
              >
                <img :src="props.item.item.images[0].path" alt="avatar">
        </v-avatar>
      </td>
      <td>{{ props.item.item.name }}</td>
      <td>
        <span v-for="(color, key) in props.item.item.colors" v-if="color.id === props.item.colorId">
                            {{ color.name}} 
        </span>
                   
        <span v-for="(size, key) in props.item.item.sizes" v-if="size.id === props.item.sizeId">
                            {{ ' - ' + size.name}} 
        </span>
      </td>
      <td>{{ props.item.quantity }}</td>
      <td>{{ props.item.item.amount }}</td>
      <td>{{ total(props.item.quantity, props.item.item.amount) }}</td>
      <td>
        <v-btn icon small class="red--text mt-3" @click.native="remove(props.index)">
                        <v-icon dark>remove_circle</v-icon>
                    </v-btn>
      </td>
    </template>
    <template slot="footer">
      <td colspan="100%" class="py-3">
        <v-layout class="pr-5 mr-3">
          <v-spacer></v-spacer>
          <span class="subheading mr-5">SUBTOTAL: </span> <span class="grey--text title pr-5 mr-5">&#8369; {{ cartTotal }} </span>
        </v-layout>
        
      </td>
    </template>
  </v-data-table>
</template>
<script>
  export default {
    data () {
      return {
        headers: [
          {
            text: 'Image',
            align: 'left',
            sortable: false,
            value: 'img'
          },
          {
            text: 'Product Name',
            align: 'left',
            sortable: false,
            value: 'product'
          },
          { text: 'C/S', 
            align: 'left',
            sortable: false,
            value: 'cs' 
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
            text: 'Total', 
            value: 'total',
            align: 'left',
            sortable: false, 
          },
          { 
            text: 'Remove', 
            value: 'remove',
            align: 'left',
            sortable: false, 
          }
        ]
        
      }
    },
    computed: {

      cart(){
        return this.$store.getters.cart
      },
      cartTotal(){
        return this.$store.getters.cartTotal
      }
    },
    methods: {
      total(qty, amt){
        var total = qty + parseFloat(amt.replace(",", ""))
        //thousands comma separator
        return total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
        

        this.$store.dispatch('newCart', cleanArray)
      }
    }
  }
</script>