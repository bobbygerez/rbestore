<template>
	<span>
		<span v-if="successLogin">
        <v-btn icon>
          <v-icon>dashboard</v-icon>
        </v-btn>
        <v-btn icon
          @click.stop="logoutUser"
        >
          <v-icon>power_settings_new</v-icon>
        </v-btn>
      </span>

      <span v-else>
        <v-btn icon
        @click.stop="dialogLogin"
      >
        <v-icon>lock</v-icon>
      </v-btn>
        <v-btn icon

          @click.stop="dialogRegister"
        >
          <v-icon>account_circle</v-icon>
        </v-btn>
      </span>

      <v-btn icon large>
        <v-avatar size="32px" tile>
          <img
            src="https://vuetifyjs.com/static/doc-images/logo.svg"
            alt="Vuetify"
          >
        </v-avatar>
      </v-btn>
      
	</span>
</template>

<script type="text/javascript">
  
  import axios from 'axios'

  export default {
    
    computed: {
      successLogin(){
        return this.$store.getters.successLogin
      }
    },
    methods: {

      dialogRegister(){

          this.$store.dispatch('dialogRegister', true);
      },
      dialogLogin(){

          this.$store.dispatch('dialogLogin', true);
      },
      logoutUser(){
          let data = this;
          let token = localStorage.getItem('tokenKey');
          axios.get(api_logout + token)
          .then(function(response){
            data.$store.dispatch('successLogin', false)

          })
          .catch(function(error){

          })
      }
    }
  }
</script>