<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="label label-success pull-right">Online {{usersInRoom.length}}</span> <h3 class="panel-title">Chat Room</h3></div>
                    <chat-log :messages="messages" :length="messages.length" :loading="loading"></chat-log>
                    <chat-composer :name="user.name"></chat-composer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                messages:[],
                user:[],
                loading: true,
                usersInRoom:[],
            }
        },
        methods: { 
            inArray: function(needle, haystack) {
                var length = haystack.length;
                for(var i = 0; i < length; i++) {
                    if(haystack[i].id == needle.id) return true;
                }
                return false;
            }
        },
        created() {
            axios.get('/user/data.json').then(response => {
                this.user = response.data;
            });
            axios.get('/chat/messages.json').then(response => {
                this.messages = response.data;
                this.loading = false;
            });

            Echo.join('chatroom')
            .here((users) => {
                this.usersInRoom = users;
            })
            .joining((user) => {
                console.log(this.inArray(user, this.usersInRoom));
                if(!this.inArray(user,this.usersInRoom)) this.usersInRoom.push(user);
            })
            .leaving((user) => {
                let index = this.usersInRoom.indexOf(user);
                this.usersInRoom.splice(index, 1);
            })
            .listen('MessagePosted', (e)=>{
                console.log(e);
                var pesan = {
                    message: e.message.message,
                    user: e.user
                }
                this.messages.push(pesan);
                console.log(pesan);

            });
        }
    }
</script>
