<template>
  <div class="text-xs-left">
    <v-menu
      offset-x
      :close-on-content-click="false"
      :nudge-width="200"
      v-model="menu"
    >
      <v-btn color="indigo" dark slot="activator"> <v-icon> menu</v-icon> {{ userProfile.firstname }} {{ userProfile.lastname }}</v-btn>
      <v-card>
        <v-list>
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img :src="imagePath()" alt="John">
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ userProfile.company }}</v-list-tile-title>
              <v-list-tile-sub-title>{{ userProfile.jobtitle }} </v-list-tile-sub-title>

            </v-list-tile-content>
            
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-list>
          <v-list-tile>
            <v-list-tile-content>
                <v-container>
                    <v-layout row wrap>
                      <v-flex xs5>
                        <v-list-tile-sub-title>Customer's Rating: </v-list-tile-sub-title>
                      </v-flex>
                      <v-flex xs5>
                        <star-rating :inline="true" :star-size="20" :read-only="true" :show-rating="false" :rating="5"></star-rating>
                      </v-flex>
                      <v-flex xs2>
                         <v-btn flat icon color="pink">
                          <v-icon>favorite</v-icon>
                        </v-btn>
                      </v-flex>
                    </v-layout>
                 </v-container>
                 
            </v-list-tile-content>
            
          </v-list-tile>
          
        </v-list>
         <v-divider></v-divider>
         <v-list>
          <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-sub-title>Customer's Feedback: </v-list-tile-sub-title>
              <v-list-tile-title>
                
              </v-list-tile-title>
            </v-list-tile-content>
            
          </v-list-tile>
          
        </v-list>
      </v-card>
    </v-menu>
  </div>
</template>
<script>
  import StarRating from 'vue-star-rating'
  export default {
    data: () => ({
      fav: true,
      menu: false,
      message: false,
      hints: true,
    }),
    components:{
      StarRating
    },
    computed: {
      userProfile(){
        return this.$store.getters.userProfile
      }

    },
    methods: {
      imagePath(){
        return base + this.userProfile.images[0].path
      }
    }
  }
</script>