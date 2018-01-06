<template>
      <v-card class="elevation-0">
        <v-card-media src="/static/doc-images/cards/desert.jpg">
        </v-card-media>
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{ productDetails.name }}</h3>
            <div>{{  productDetails.short_desc}}</div>
          </div>
        </v-card-title>
        <v-card-actions>
          <v-btn color="error">{{ productDetails.amount }}</v-btn>
          <v-btn color="primary">Add Cart</v-btn>
        </v-card-actions>
      </v-card>
</template>

<script>
  export default {
 
    computed: {
      productDetails(){
        return this.$store.getters.productDetails
      }
    }
  }
</script>