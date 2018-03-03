<template>
	
</template>
<script type="text/javascript">
	
	export default {

		created(){

			this.$store.dispatch('items', 
				[{ icon: 'place', text: 'My account' },
        		{ icon: 'account_balance', text: 'stores'},
        		{ icon: 'chat_bubble', text: 'sample' },
        		{ icon: 'help', text: 'Help' }]
        	)
		}
	}
</script>