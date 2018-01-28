<template>
  <div>
     <div class="images" v-viewer="{movable: false}">
      <img v-for="(src, key) in item.images" :src="src.path" :key="key">
    </div>
      <v-avatar
              :tile="true"
              :size="'200px'"
              class="grey lighten-4 mouseOver"
            >
              <img class="center-text imgProduct"
          :src="item.images[0].path"
          center
          @click="show"
        />
      </v-avatar>

  </div>
</template>
<script>
  export default {
    props: ['item'],
    methods: {
      show () {
        const viewer = this.$el.querySelector('.images').$viewer
        viewer.show()
      }
    }
  }
</script>

<style type="text/css">
  .images {
    display: none;
  }
  .mouseOver:hover{
    cursor: pointer;
  }
</style>