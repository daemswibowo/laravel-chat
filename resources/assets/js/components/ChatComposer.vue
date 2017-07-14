<template>
	<div class="panel-footer">
		<form v-on:submit.prevent="kirimPesan">
			<input type="text" class="form-control" v-model="pesan">
		</form>
	</div>
</template>

<script>
	export default {
		props:['name'],
		data () {
			return {
				pesan:''
			}
		},
		created() {
			axios.get('/')
		},
		methods: {
			kirimPesan: function (){
				axios.post('/chat/store', {
					message: this.pesan
				})
				.then(response => {
					this.$emit('messagesent', {
						message: this.pesan,
						user: {
							name: this.name
						}
					});
					this.pesan = '';
				})
				.catch(error => {
					console.log(error);
				});
			}
		}
	}
</script>
