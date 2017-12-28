<template>

    <v-flex xs6 sm4 md3 lg3 xl3 >
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
            <div class="headline">{{ item.name }}</div>
            <span class="gray--text" >Posted: {{ item.created_at }}</span>
            <br />
            <span class="red--text text--darken-4" >{{ item.amount }}</span>
          </div>
        </v-card-title>
        <v-card-actions>
          <v-btn flat >View more</v-btn>
          <v-spacer></v-spacer>
          <v-btn icon @click.native="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>
        <v-slide-y-transition>
          <v-card-text v-show="show">
           {{ item.short_desc}}
          </v-card-text>
        </v-slide-y-transition>
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
<style type="text/css">
  
  .gray--text{
    font-size: 12px;
  }
 

</style>