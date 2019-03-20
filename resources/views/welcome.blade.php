<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <div id="chat">
            <h1>New Users</h1>
            <ul id="users">
                <li v-for="user in users">@{{user}}</li>
            </ul>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.9/vue.min.js"></script>
        <script>
            var socket = io('http://192.168.10.10:3000');

            new Vue({
                el: '#chat',
                data:  {
                    users: [],
                },
                mounted() {
                    socket.on('test-channel:App\\Events\\UserSignedUp', function(data){
                        console.log(data);
                        this.users.push(data.username);
                    }.bind(this));
                },

            })
        </script>
    </body>
</html>
