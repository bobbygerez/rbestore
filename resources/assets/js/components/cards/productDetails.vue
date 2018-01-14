<template>
      <v-card class="elevation-0">
        
        <v-card-title primary-title>
          <div>
            
            <h3 class="headline mb-0">{{ productDetails.name }}</h3>
            <profile-v-viewer></profile-v-viewer>
            <p class="subheading pa-1">
              &#8369; {{ productDetails.amount }}
            </p>
             <span class="grey--text">
             <v-icon class="title">place</v-icon>{{ productDetails.created_at }} 
              {{ productDetails.province.provDesc }}, {{ productDetails.city.citymunDesc }}, {{ productDetails.brgy.brgyDesc }}
             ({{ productDetails.user_name.mobile }}) <br />
             <v-icon class="title">add_shopping_cart</v-icon>: {{ quantity }}
             items left</span>
             <br />
             <div class="body-1 pa-1">
                {{ productDetails.short_desc }}
             </div>
          </div>
        </v-card-title>
        <v-card-actions>
          <v-btn color="error"><v-icon class="title">shopping_cart</v-icon>Add Cart</v-btn>
        </v-card-actions>
      </v-card>
</template>

<script>
  import profileVViewer from '../viewer/profile-v-viewer'
  export default {
    components: {
      profileVViewer
    },
    computed: {
      productDetails(){
        return this.$store.getters.productDetails
      },
       quantity(){
            return this.productDetails.qty.map((q)=>q.qty).reduce(function(total, q) {
                 return total + q}, 0);
          }
    }
  }
</script>