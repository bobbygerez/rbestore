<template>
	<v-text-field
        class="elevation-0"
        placeholder="Quantity"
        :prepend-icon="'remove'"
        :prepend-icon-cb="subtract"
        :append-icon="'add'"
        :append-icon-cb="add"
        :value="value"
        :type="'number'"
      ></v-text-field>
</template>
<script type="text/javascript">
	export default {
		data: ()=> ({
			value: 1
		}),
		methods: {

			add(){
				this.value += 1
			},
			subtract(){

				if (this.value != 1){

					this.value -= 1
				}
				
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
