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
                      <v-list-tile slot="activator" 
                        @click="subcategoryClick(category.name, category.id, subcategory.name, subcategory.id)">
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
          this.$router.push({ path: '/category/'+ this.lowerCase(catName) + '/' + catId})
          this.$store.dispatch('categoryId', catId)
        },
        subcategoryClick(catName, catId, subName, subId){
          this.$router.push({   
            path: '/category/'+ this.lowerCase(catName) + '/' + catId + '/subcategory/' + this.lowerCase(subName) + '/' + subId
          })
           this.$store.dispatch('subcategoryId', subId)
        },
        lowerCase(str){

          return str.replace(/\s+/g, '-').toLowerCase();

        }
    }
  }
</script>

<style type="text/css">
  .category{
    text-decoration: none;
  }
</style>