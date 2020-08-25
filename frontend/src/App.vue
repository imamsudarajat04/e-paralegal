
<template>
	<v-app>
		<router-view/>
		<confirm ref="confirm"></confirm>				
	</v-app>
</template>
<script>
import confirm from "./components/Confirm"
export default {	
	name: 'E-Paralegal',
	mounted()
	{
		this.$root.$confirm = this.$refs.confirm;
	},	
	components:{
		confirm
	}
}
</script>