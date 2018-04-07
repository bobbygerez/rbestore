<template>
	<span>
		<span v-if="successLogin">
        <shopping-cart></shopping-cart>
        <categories-menu></categories-menu>

        <v-btn icon
           @click.stop="dashboard"
        >
          <v-icon>dashboard</v-icon>
        </v-btn>
        <v-btn icon
          @click.stop="logoutUser"
        >
          <v-icon>power_settings_new</v-icon>
        </v-btn>
      </span>

      <span v-else>
      <shopping-cart></shopping-cart>
      <categories-menu></categories-menu>
      

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
      
      
      
	</span>
</template>

<script type="text/javascript">
  
  import axios from 'axios' 
  import shoppingCart from '../../components/menu/shoppingCart.vue'
  import categoriesMenu from '../../components/menu/categories-menu.vue'


  export default {
    data: () => ({
    }),
    components: {
      shoppingCart, categoriesMenu
    },
    computed: {
      authUser(){
          return this.$store.getters.authUser
        },
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
      dashboard(){
        this.$router.push('/dashboard/user')
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