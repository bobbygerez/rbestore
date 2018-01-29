<template>
  <v-stepper v-model="e6" vertical>
    <details-b-c></details-b-c>
    <h2 class="display-1 ma-3 pb-0">Shopping Cart</h2>
    <v-stepper-step step="1" v-bind:complete="e6 > 1" class="pt-0">
      Review your product
    </v-stepper-step>
    <v-stepper-content step="1">
      <v-card-text class="mb-5" height="200px">
        <v-container>
          <check-out-table></check-out-table>
        </v-container>
      </v-card-text>
      <v-btn color="primary" @click.native="e6 = 2">Continue</v-btn>
    </v-stepper-content>
    <v-stepper-step step="2" v-bind:complete="e6 > 2">Apply Discount Code</v-stepper-step>
    <v-stepper-content step="2">
      <v-card-text class="mb-5" height="200px">
        <v-container>
          <v-layout>
            <v-flex xs12 sm12 md6 lg6 xl6>
            <v-text-field
              name="input-1-3"
              label="Enter Discount Code"
              :append-icon="'send'"
              :append-icon-cb="submit"
              v-bind:rules="[() => ('Invalid Discount Code')]"
              single-line
            ></v-text-field>
          </v-flex>
          </v-layout>
        </v-container>
      </v-card-text>
      <v-btn color="primary" @click.native="e6 = 3">Continue</v-btn>
      <v-btn flat @click.native="e6 = 1">Previous</v-btn>
    </v-stepper-content>
    <v-stepper-step step="3" v-bind:complete="e6 > 3">Delivery Details</v-stepper-step>
    <v-stepper-content step="3">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click.native="e6 = 4">Continue</v-btn>
      <v-btn flat @click.native="e6 = 2">previous</v-btn>
    </v-stepper-content>
    <v-stepper-step step="4">Payment Methods</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click.native="e6 = 1">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
  </v-stepper>
</template>

<script>
  import detailsBC from '../../components/breadcrumbs/detailsBC.vue'
  import checkOutTable from '../../components/data-tables/checkoutTable.vue'
  export default {
    data () {
      return {
        e6: 1,
        error: false
      }
    },
    computed: {
      cartTotal(){
        return this.$store.getters.cartTotal
      }
    },
    created(){
      this.$store.dispatch('navBreadCrumbs', [
              {
                text: 'Home',
                to: '/',
                disabled: false
              },
              {
                text: 'Checkout',
                disabled: false,
              }])
    },
    components: {
      detailsBC, checkOutTable
    },
    
    methods: {
      remove(key){
        this.$store.dispatch('removeCartItem', key)
      },
      submit(){
        alert('asasdf');
      }
    }
  }
</script>