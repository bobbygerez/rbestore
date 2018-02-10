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
              v-if="company.images[0].path != undefined || company.images[0].path != null"
            >
              <img class="center-text imgProduct"
          :src="company.images[0].path"
          center

        />
      </v-avatar>
      <v-viewer  v-bind:item="company" ></v-viewer>
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
              <router-link :to="'company/' + company.name"> {{ company.name }} </router-link>
            </div>
             <v-icon class="title">person</v-icon>
             <router-link :to="'user/' + company.user.uuid "> {{ company.user.firstname }} {{ company.user.lastname }} </router-link>
             <span class="grey--text">
             <br />
             <v-icon class="title">place</v-icon>
             <span v-for="branch in company.branches">
                {{ branch.brgy.brgyDesc}}, {{ branch.city.citymunDesc}}, {{ branch.province.provDesc}}
             </span>
            
             </span>
          </div>
        </v-card-title>

      </v-card>
      
    </v-flex>
   
    
</template>

<script>
  import axios from 'axios'
  // import addCartProductMenu from '../../components/menu/addCartProductMenu.vue'
  import vViewer from '../../../components/viewer/v-viewer.vue'

  export default {
    props: ['company', 'index'],
    data: () => ({
      show: false,
      cardME: "elevation-1"
    }),
    components:{
      vViewer
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
