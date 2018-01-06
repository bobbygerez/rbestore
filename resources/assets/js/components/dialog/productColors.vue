<template>
	<v-dialog v-model="dialogColors" max-width="500px">
        <v-card >
          <v-card-title class="mb-0 pb-0">
            <h4 class="subheading">More Options</h4>
            <v-spacer></v-spacer>
          </v-card-title>
          <v-card-text class="mt-0 mb-0 pt-0 pb-0">
          	<p-colors></p-colors>
          </v-card-text>
          <v-card-actions class="mt-0 pt-0">
            <v-btn color="primary" flat @click.stop="dialogColors = false">Close</v-btn>
          </v-card-actions>
        </v-card>
     </v-dialog>
</template>

<script>
 import pColors from '../../components/select/colors/selectColors.vue'

  export default {
  	components: {
  		pColors
  	},
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