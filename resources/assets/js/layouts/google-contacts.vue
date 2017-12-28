<template>
  <v-app id="inspire">

    <v-navigation-drawer
      fixed
      clipped
      app
      v-model="drawer"
    >
      <v-list dense>
        <template v-for="(item, i) in items">
          <v-layout
            row
            v-if="item.heading"
            align-center
            :key="i"
          >
            <v-flex xs6>
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-flex>
            <v-flex xs6 class="text-xs-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-flex>
          </v-layout>
          <v-list-group v-else-if="item.children" v-model="item.model" no-action>
            <v-list-tile slot="item" @click="">
              <v-list-tile-action>
                <v-icon>{{ item.model ? item.icon : item['icon-alt'] }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ item.text }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            <v-list-tile
              v-for="(child, i) in item.children"
              :key="i"
              @click="itemChildren"
            >
              <v-list-tile-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ child.name }} 
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list-group>
          <v-list-tile v-else @click="itemClick(item.text)">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>
                {{ item.text }} 
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
      </v-list>
    </v-navigation-drawer>


    <v-toolbar
      color="blue darken-3"
      dark
      app
      clipped-left
      fixed
      class="hidden-sm-and-down"
    >
      <v-toolbar-title style="width: 300px" class="ml-0 pl-3 ">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        RBeStore
      </v-toolbar-title>
      <v-text-field
        solo
        prepend-icon="search"
        placeholder="Search"
      ></v-text-field>
      <v-spacer></v-spacer>


      <mainMenu></mainMenu>

    </v-toolbar>
    <v-toolbar
      color="blue darken-3"
      dark
      app
      clipped-left
      fixed

      class="hidden-md-and-up"
    >
        
       <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-text-field
        solo
        prepend-icon="search"
        placeholder="Search"
      ></v-text-field>
      
      <mainMenu></mainMenu>
      
    </v-toolbar>
      <v-content>

        <v-container fluid grid-list-md>
       <!--    PRODUCT HERE -->

        <product-bread-crumbs></product-bread-crumbs>
          <v-layout row wrap>
              <product
                 v-for="(product, index) in products.data"
                  v-bind:item="product"
                  v-bind:index="index"
                  v-bind:key="product.id"
                   
              >

              </product>

        </v-layout>


        </v-container>
        <product-page></product-page>
       <!-- END PRODUCT HERE -->
        
      </v-content>
    
    <v-dialog v-model="dialog.register" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          New user
        </v-card-title>
        <v-form v-model="valid" ref="register" lazy-validation>
        <v-container grid-list-sm class="pa-4">
          <v-layout row wrap>
            <v-flex xs6>
              <v-text-field
                prepend-icon="account_circle"
                placeholder="Firstname"
                v-model="firstname"
                :rules="nameRules"
                :counter="20"
                required
              ></v-text-field>
            </v-flex>
            <v-flex xs6>
              <v-text-field
                placeholder="Lastname"
                v-model="lastname"
                :rules="nameRules"
                :counter="20"
                required
              ></v-text-field>
            </v-flex>
            
            <v-flex xs12>
              <v-text-field
                prepend-icon="mail"
                placeholder="Email"
                v-model="email"
                :rules="emailRules"
                required
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                type="tel"
                prepend-icon="phone_android"
                placeholder="Mobile number"
                :mask="maskMobile"
                v-model="mobile"
                :rules="mobileRules"
                required
              ></v-text-field>
              
            
            </v-flex>
            <v-flex xs12>

              <v-text-field
              name="input-10-1"
              label="Enter your password"
              hint="At least 8 characters"
              v-model="password"
              :rules="passwordRules"
              :prepend-icon= "e1 ? 'visibility' : 'visibility_off'""
              :prepend-icon-cb="() => (e1 = !e1)"
              :type="e1 ? 'password' : 'text'"
              counter
            ></v-text-field>

            </v-flex>

          </v-layout>
        </v-container>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat  @click="dialogCancel">Cancel</v-btn>
          <v-btn flat @click="submit" class="blue--text text--darken-3">submit</v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialog.login" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          Login 
        </v-card-title>
        

        <v-form v-model="valid" ref="login" lazy-validation>
        <v-container grid-list-sm class="pa-4">
          <v-alert color="error" icon="warning" dismissible v-model="loginAlert">
          {{ loginMessage }}
        </v-alert>
          <v-layout row wrap>
           
            
            <v-flex xs12>
              <v-text-field
                prepend-icon="mail"
                placeholder="Email"
                v-model="email"
                :rules="emailRules"
                required
              ></v-text-field>
            </v-flex>
            
            <v-flex xs12>

              <v-text-field
              name="input-10-1"
              label="Enter your password"
              hint="At least 8 characters"
              v-model="password"
              :rules="passwordRules"
              :prepend-icon= "e1 ? 'visibility' : 'visibility_off'""
              :prepend-icon-cb="() => (e1 = !e1)"
              :type="e1 ? 'password' : 'text'"
              counter
            ></v-text-field>

            </v-flex>

          </v-layout>
        </v-container>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat  @click="dialogCancel">Cancel</v-btn>
          <v-btn flat @click="loginAccount" class="blue--text text--darken-3">submit</v-btn>
        </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>

    <filter-categories></filter-categories>
  </v-app>
</template>

<script>

  import axios from 'axios'
  import mainMenu from '../components/users/main-menu.vue'
  import provinces from '../components/select/provinces.vue'
  import cities from '../components/select/cities.vue'
  import categories from '../components/select/categories.vue'
  import product from '../components/cards/product.vue'
  import filterCategories from '../components/dialog/filterCategories.vue'
  import productPage from '../components/pagination/productPage.vue'
  import productBreadCrumbs from '../components/breadcrumbs/productBreadCrumbs.vue'

  export default {
    components: {
      mainMenu, provinces, product, cities, categories, filterCategories, productPage, productBreadCrumbs
    },
    data: () => ({
        lorem: `Lorem ipsum dolor sit amet, mel at clita quando. Te sit oratio vituperatoribus, nam ad ipsum posidonium mediocritatem, explicari dissentiunt cu mea. Repudiare disputationi vim in, mollis iriure nec cu, alienum argumentum ius ad. Pri eu justo aeque torquatos.`,
        e1: true,
        e2: false,
        e3: false,
        e4: false,
        loginAlert: false,
        loginMessage: '',
      passwordRules: [
          (v) => !!v || 'Password is required',
          (v) => v.length >= 8 || 'Password must be at least 8 characters'
        ],
      nameRules: [
          (v) => !!v || 'Name is required',
          (v) => v.length <= 20 || 'Name must be less than 10 characters'
        ],
      emailRules: [
          (v) => !!v || 'E-mail is required',
          (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
        ],
      mobileRules: [
        (v) => !!v || 'Mobile number is required'
      ],
      maskMobile: '(09##) - ### - ####',
      valid: true,
      drawer: true,
      
    }),

    computed: {

        products(){
          return this.$store.getters.products
        },
        dialog: {
            get(){

              return this.$store.getters.dialog
            }
        },
        firstname: {

            get(){
              return this.$store.getters.users.firstname
            },
            set(value) {
              this.$store.dispatch('users', {
                  fieldName: 'firstname',
                  value: value
              })
            }
        },
        lastname: {

          get(){
            return this.$store.getters.users.lastname
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'lastname',
              value: value
            })
          }
         },
         company: {

          get(){
            return this.$store.getters.users.company
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'company',
              value: value
            })
          }
         },
         jobTitle: {

          get(){
            return this.$store.getters.users.jobTitle
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'jobTitle',
              value: value
            })
          }
         },
         email: {

          get(){
            return this.$store.getters.users.email
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'email',
              value: value
            })
          }
         },
         password: {

          get(){
            return this.$store.getters.users.password
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'password',
              value: value
            })
          }
         },
         mobile: {

          get(){
            return this.$store.getters.users.mobile
          },
          set(value){
            this.$store.dispatch('users',{
              fieldName: 'mobile',
              value: value
            })
          }
         },
          
          items(){

          return this.$store.getters.items
        }
    },

    methods: {


      itemClick(value){

        if( value == 'Categories'){
          this.$store.dispatch('filterCategories', true);
        }
      },
      dialogCancel(){
          this.$store.dispatch('dialogCancel');
      },
      submit() {

        if (this.$refs.register.validate()) {
          
          axios.post(api_register,{
            firstname: this.firstname,
            lastname: this.lastname,
            company: this.company,
            jobtitle: this.jobTitle,
            email: this.email,
            password: this.password
          });

        }
      },
      loginAccount(){

        if (this.$refs.login.validate()) {
          let data = this
          axios.post(api_login, {
            email: this.email,
            password: this.password
          }).then(function(response){

              localStorage.setItem('tokenKey', response.data.token)
              data.$store.dispatch('successLogin', true)
              data.dialogCancel()

          })

          .catch(function(error){
            data.loginAlert = true;
            data.loginMessage = error.response.data;
          })

        }
      },
      clear () {
        this.$refs.form.reset()
      },
      itemChildren(){
        alert('asdf')
      }
    },

    props: {
      source: String
    }
  }
</script>