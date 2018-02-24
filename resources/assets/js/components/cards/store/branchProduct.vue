<template>

    <v-flex xs12 sm6 md3 lg3 xl3 >
      <v-card 
        :class="cardME"
        v-on:mouseover="productHover"
        v-on:mouseleave="productLeave"

      >
      <div class="text-xl-center text-lg-center text-md-center text-sm-center">
      <v-avatar
              :tile="true"
              :size="'200px'"
              class="grey lighten-4 hiddenImage"
              v-if="product.images[0].path != undefined || product.images[0].path != null"
            >
              <img class="center-text imgProduct"
          :src="product.images[0].path"
          center

        />
      </v-avatar>
      <v-viewer  v-bind:item="product" ></v-viewer>
      </div>
        
        

        <!--   <v-card-media
          v-for="(image, index) in item.images"
          v-bind:item="image"
          v-bind:index="index"
          v-bind:key="image.id"
          v-if="image.is_primary"
          :src="image.path"
          height="200px"
        >
        </v-card-media> -->


        <v-card-title primary-title>
          <div>
            <div class="title">
              <router-link :to="'product/details/' + product.uuid"> {{ product.name }} </router-link>
            </div>
            <div class="subheading pa-1">
              &#8369; {{ product.amount }}
            </div>
             <span class="grey--text">
             <v-icon class="title">add_shopping_cart</v-icon>: 
              {{ quantity }} left in stock </span>
          </div>
        </v-card-title>
          <v-card-actions>
          <add-cart-product-menu  v-on:click.native="dialogColors" v-bind:product="product"></add-cart-product-menu>
          <v-spacer></v-spacer>
          <v-btn icon @click.native="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>

      </v-card>
      
    </v-flex>
   
    
</template>

<script>
  import axios from 'axios'
  import vViewer from '../../../components/viewer/v-viewer.vue'
  import addCartProductMenu from '../../../components/menu/addCartProductMenu.vue'



  export default {
    props: ['product', 'index'],
    data: () => ({
      show: false,
      cardME: "elevation-1"
    }),
    components: {
      vViewer, addCartProductMenu
    },
    computed: {
     quantity(){
            return this.product.qty.map((q)=>q.qty).reduce(function(total, q) {
                 return total + q}, 0);
          },
    },
    methods: {

      productHover(){
        this.cardME = "elevation-6"
      },
      productLeave(){
        this.cardME = "elevation-1"
      },
      dialogColors(){
        // let data = this
        // axios.get(api_item + '/details/' + uuid)
        // .then(function(response){
        //   data.$store.dispatch('productDetails', response.data.item)
        // })
        // .catch()
        this.$store.dispatch('dialogColors', true);
      }
    }

    
  }
</script>
<style type="text/css">
  .title a{
    text-decoration: none;
    color: #337ab7;
  }
  .title a:hover{
    text-decoration: underline;
  }
  .hiddenImage {
    display: none
  }
</style>
