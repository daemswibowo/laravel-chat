<template>
	<div v-if="loading" class="panel-body text-center"><i class="fa fa-refresh fa-spin fa-2x"></i></div>
	<ul class="list-group" v-else>
		<li class="list-group-item text-center" v-if="length==0 && !loading">Tidak ada chat</li>

		<chat-pesan v-for="message in messages" :pesan="message" :key="message.id" v-else></chat-pesan>
	</ul>
</template>

<script>
	export default {
		props:['messages','length','loading']
	}
</script>
