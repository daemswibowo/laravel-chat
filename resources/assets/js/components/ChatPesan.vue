<template>
    <li class="list-group-item">
        <p><b>{{ pesan.user.name }}</b></p>
        <p>{{ pesan.message }}</p>
    </li> 
</template>

<script>
    export default {
        props:['pesan']
    }
</script>
