<template>
  <v-carousel delimiter-icon="stop" class="ma-1">
    <v-carousel-item v-for="(image,i) in images" v-bind:src="image.path" :key="i"></v-carousel-item>
  </v-carousel>
</template>

<script>
  export default {
 
    computed: {
      images(){
        return this.$store.getters.productDetails.images
      }
    }
  }
</script>