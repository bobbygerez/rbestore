<template>
  <viewer :images="images">
      <button v-for="(src,key) in images" class="elevation-1 ma-1"><img  :src="src.path" :key="key" :width="200"></button>
    </viewer>
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

