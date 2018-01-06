<template>
	<v-dialog v-model="dialogColors" max-width="500px">
        <v-card>
          <v-card-title>
            <h4>More Options</h4>
            <v-spacer></v-spacer>
            <v-menu bottom left>
              <v-btn icon slot="activator">
                <v-icon>more_vert</v-icon>
              </v-btn>
              <v-list>
                <v-list-tile v-for="(item, i) in items" :key="i" @click="">
                  <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile>
              </v-list>
            </v-menu>
          </v-card-title>
          <v-card-actions>
            <v-btn color="primary" flat @click.stop="dialogColors = false">Close</v-btn>
          </v-card-actions>
        </v-card>
     </v-dialog>
</template>

<script>
  export default {
  	
    computed: {

    	dialogColors: {
    		get(){
    			return this.$store.getters.dialogColors
    		},
    		set(value){
    			this.$store.dispatch('dialogColors', value);
    		}
    		
    	}
    }
  }
</script>