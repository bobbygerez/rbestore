<template>
	<v-text-field
        class="elevation-0"
        placeholder="Quantity"
        :prepend-icon="'remove'"
        :prepend-icon-cb="subtract"
        :append-icon="'add'"
        :append-icon-cb="add"
         v-model="cartQuantity"
        :type="'number'"
        :min="1"

      ></v-text-field>
</template>
<script type="text/javascript">
	export default {
		
		computed:{
			cartQuantity: {
				get(){
					return this.$store.getters.cartQuantity
				},
				set(value){
					if(value == "" || value <= 0){
						this.$store.dispatch('cartQuantity', 1)
					}
					else{
						this.$store.dispatch('cartQuantity', parseInt(value))
					}
					
				}
				
			}
		},
		methods: {

			add(){
				this.$store.dispatch('cartQuantity', this.cartQuantity += 1)
			},
			subtract(){

				if (this.cartQuantity != 1){

					this.cartQuantity -= 1
				}
				
			},
			clearQuantity(){
				this.$store.dispatch('cartQuantity', 1)
			}
		}
	}
</script>
<style type="text/css">
	input[type='number']{
		font-size: 24px;
		text-align: center;
	}
</style>
