<template>
  <span>
	<v-menu offset-y offset-x left >
        <v-btn icon slot="activator">
           <v-icon>more_vert</v-icon>
        </v-btn>
        <v-list dense v-for="(category, i) in categories" :key="i">
               <v-menu offset-x open-on-hover left full-width >
                <v-list-tile slot="activator" :key="i" @click="categoryClick(category.name, category.id)">
                  <v-list-tile-action>
                        <v-icon>navigate_before</v-icon>
                  </v-list-tile-action>
                  <v-list-tile-title>{{ category.name }}</v-list-tile-title>
                </v-list-tile>
                  <v-list dense v-for="(subcategory, a) in category.subcategory" :key="a">
                      <v-menu offset-x open-on-hover left full-width >
                      <v-list-tile slot="activator" @click="">
                        <v-list-tile-action>
                          <v-icon>navigate_before</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-title>{{ subcategory.name }}</v-list-tile-title>
                      </v-list-tile>
                      <v-list dense v-for="(furtherCat, b) in subcategory.further_category" :key="b">
                        <v-menu offset-x open-on-hover left full-width >
                          <v-list-tile  slot="activator" @click="">
                            <v-list-tile-title>{{ furtherCat.name }}</v-list-tile-title>
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
    methods: {
        categoryClick(catName, catId){
          this.$router.push({ path: '/category/'+ catName + '/' + catId})
          this.$store.dispatch('categoryId', catId)
        }
    }
  }
</script>

<style type="text/css">
  .category{
    text-decoration: none;
  }
</style>