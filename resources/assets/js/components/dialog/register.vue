<template>
	<v-dialog v-model="dialog.register" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          New user
        </v-card-title>
        <v-form v-model="valid" ref="form" lazy-validation>
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
</template>

<script type="text/javascript">
	export default {

		 data: () => ({
		 	e1: true,
		    e2: false,
		    e3: false,
		    e4: false,
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
		 }),

		 computed: {

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
	         }
		 },

		 methods: {

		 	 dialogCancel(){
          		this.$store.dispatch('dialogCancel');
		      },
		      submit () {
		        if (this.$refs.form.validate()) {
		          
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
		      
		 }

		
	}
</script>