<template>
  <span>
	<v-menu offset-y offset-x left>
        <v-btn icon slot="activator">
           <v-icon>more_vert</v-icon>
        </v-btn>
        <v-list dense v-for="(category, i) in categories" :key="i">
               <v-menu offset-x open-on-hover left class="menuWidth">
                <v-list-tile slot="activator" :key="i" @click="">
                  <v-list-tile-action>
                        <v-icon>navigate_before</v-icon>
                  </v-list-tile-action>
                  <v-list-tile-title>{{ category.name }}</v-list-tile-title>
                </v-list-tile>
                  <v-list dense v-for="(subcategory, a) in category.subcategory" :key="a">
                      <v-menu offset-x open-on-hover left class="menuWidth">
                      <v-list-tile slot="activator" @click="">
                        <v-list-tile-action>
                          <v-icon>navigate_before</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-title>{{ subcategory.name }}</v-list-tile-title>
                      </v-list-tile>
                      <v-list dense>
                        <v-list-tile v-for="i in 5" :key="i" @click="">
                          <v-list-tile-title>{{ i }}</v-list-tile-title>
                        </v-list-tile>
                      </v-list>
                    </v-menu>
                  
                  </v-list>
                </v-menu>
        </v-list>
  </v-menu>
  </span>
</template>

<script type="text/javascript">
  
  export default {

    computed: {
      categories: {
        get(){ return this.$store.getters.categories },
        set(){}
      }
    },
  }
</script>

<style type="text/css">
  .menuWidth{
    width: 100%;
  }
</style>