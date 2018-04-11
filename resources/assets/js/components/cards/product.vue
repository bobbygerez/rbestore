<template>

    <v-flex xs12 sm6 md3 lg3 xl3 >
      <v-card 
        :class="cardME"
        v-on:mouseover="productHover"
        v-on:mouseleave="productLeave"

      >
      <div class="text-xl-center text-lg-center text-md-center text-sm-center"
        v-if="Object.keys(item.images).length > 0"
      >
        <v-avatar
                :tile="true"
                :size="'200px'"
                class="grey lighten-4 hiddenImage"
              >
                <img class="center-text imgProduct"
            :src="item.images[0].path"
            center

          />
        </v-avatar>
        <v-viewer  v-bind:item="item" ></v-viewer>

      </div>
      <div class="text-xl-center text-lg-center text-md-center text-sm-center"
        v-else
      >
        <v-avatar
                :tile="true"
                :size="'200px'"
                class="grey lighten-4"
              >
                <img class="center-text imgProduct"
            src='images/uploads/62.jpg'
            center

          />
        </v-avatar>
      </div>


      <!--     <v-card-media
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
            <div class="title text-xl-center text-lg-center text-md-center text-sm-center text-xs-center">
              <router-link :to="'product/details/' + item.uuid"> {{ item.name }} </router-link>
            </div>
            <div class="subheading pa-1">
              &#8369; {{ item.amount }} 
            </div>
             <span class="grey--text">
             <v-icon class="title">place</v-icon> {{ item.category.name }} {{ item.created_at }} 
              {{ item.province.provDesc }}, {{ item.city.citymunDesc }}, {{ item.brgy.brgyDesc }}
             ({{ item.user_name.mobile }}) <br />
             <v-icon class="title">add_shopping_cart</v-icon>: {{ quantity }}
              left in stock</span>
             <br />
             <v-icon class="title">account_balance</v-icon>
             <router-link :to="'user/' + item.user_name.uuid"> </router-link>
             <!-- <router-link :to="'user/' + item.user_name.uuid">{{ item.user_name.company.name }}  </router-link> -->
          </div>
        </v-card-title>

        <v-card-actions>
          <add-cart-product-menu  v-on:click.native="addInfo(item.uuid)" v-bind:product="item"></add-cart-product-menu>
          <v-spacer></v-spacer>
          <v-btn icon @click.native="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>
         <v-slide-y-transition>
          <v-card-text v-show="show">
            {{ item.short_desc }}
          </v-card-text>
        </v-slide-y-transition>
      </v-card>
      
    </v-flex>
   
    
</template>

<script>
  import axios from 'axios'
  import addCartProductMenu from '../../components/menu/addCartProductMenu.vue'
  import vViewer from '../../components/viewer/v-viewer.vue'

  export default {
    props: ['item', 'index'],
    data: () => ({
      show: false,
      cardME: "elevation-1"
    }),
    components: {
      addCartProductMenu,vViewer
    },
    computed: {
     quantity(){
            return this.item.qty.map((q)=>q.qty).reduce(function(total, q) {
                 return total + q}, 0);
          }
    },
    methods: {

      productHover(){
        this.cardME = "elevation-6"
      },
      productLeave(){
        this.cardME = "elevation-1"
      },
      addInfo(uuid){
        let data = this
        axios.get(api_item + '/details/' + uuid)
        .then(function(response){
          data.$store.dispatch('productDetails', response.data.item)
        })
        .catch()
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
