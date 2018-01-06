<template>

    <v-flex xs12 sm6 md3 lg3 xl3 >
      <v-card 
        :class="cardME"
        v-on:mouseover="productHover"
        v-on:mouseleave="productLeave"

      >
        <v-card-media
          :src="item.images[0].path"
          height="200px"
        >
        </v-card-media>

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
            <div class="title">{{ item.name }}</div>
             <span class="grey--text">
             <v-icon class="title">place</v-icon>{{ item.created_at }} 
              {{ item.province.provDesc }}, {{ item.city.citymunDesc }}, {{ item.brgy.brgyDesc }}
             ({{ item.user_name.mobile }}) <br />
             <v-icon class="title">add_shopping_cart</v-icon>: {{ quantity }}
             items left</span>
             <br />
             <v-icon class="title">person</v-icon>
             <router-link :to="'user/' + item.user_name.uuid"> {{ item.user_name.firstname }} {{ item.user_name.lastname }} </router-link>
          </div>
        </v-card-title>
        <v-card-actions class="ma-0">
          
          
        </v-card-actions>
        <v-card-actions>
          <v-btn color="error" dark>{{ item.amount }}</v-btn>
          <v-btn color="primary" >Add Cart</v-btn>
          <v-spacer></v-spacer>
          <v-btn icon :to="'product/details/' + item.uuid">
            <v-icon>more</v-icon>
          </v-btn>
        </v-card-actions>
        
      </v-card>
    </v-flex>
   
    
</template>

<script>
  export default {
    props: ['item', 'index'],
    data: () => ({
      show: false,
      cardME: "elevation-1"
    }),
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
      }
    }

    
  }
</script>
