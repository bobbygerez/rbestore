<template>
<v-layout class="text-xs-left ">
   <v-flex xl5 lg5 md5 sm5 xs5>

    <v-avatar
    class="grey lighten-4"
    size="62px"
    >
    <img :src="item.item.images[0].path" alt="avatar" >
  </v-avatar>

  <br />
  <span class="grey--text" v-for="(color, key) in item.item.colors" v-if="color.id === item.colorId">
    {{ color.name}} 
  </span>
  -
  <span class="grey--text" v-for="(size, key) in item.item.sizes" v-if="size.id === item.sizeId">
    {{ size.name}} 
  </span>

</v-flex>
<v-flex xl2 lg2 md2 sm2 xs2>
  <h3 class="subheading mt-3 ml-1">{{ item.quantity}}</h3>
</v-flex>
<v-flex xl3 lg3 md3 sm3 xs3>
  <h3 class="subheading mt-3 ml-1">{{ item.item.amount }}</h3>
</v-flex>
<v-flex xl1 lg1 md1 sm1 xs1>
 <v-btn icon small class="red--text mt-3" @click.native="remove(key)">
  <v-icon dark>remove_circle</v-icon>
</v-btn>
</v-flex>

</v-layout>
</template>

<script type="text/javascript">
  export default{
    props: ['item']
  }
</script>