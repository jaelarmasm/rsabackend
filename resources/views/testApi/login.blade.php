<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TestApi Login</title>
    <style>
        input {
            margin-bottom: 5px;
            display: block !important;
        }
    </style>
</head>

<body>
    <section id="login-section">
        <form method="POST">
            <input type="username" name="username" id="username" autofocus>
            <input type="password" name="password" id="password">
            <input type="submit" name="login" id="login" value="Login">
        </form>
    </section>

    <section id="user-section">
    </section>

    <script>
        (function() {
            'use strict';
            
            let login = document.getElementById('login');

            login.addEventListener('click', e => {

                e.preventDefault();

                fetch('http://rsabackend.test/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        username: document.getElementById('username').value,
                        password: document.getElementById('password').value,
                    }),
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    localStorage.setItem('token', data.access_token);
                    showUser();
                })
            });
        })();

        function showUser(){
            'use strict';

            let userSection = document.getElementById('user-section');
            let login = document.getElementById('login-section');
            let user = '';

            if (localStorage.getItem('token')) {
                fetch('http://rsabackend.test/api/user', {
                    method: 'GET',
                    headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}
                })
                .then(response => {
                    return response.json()
                })
                .then(data => {
                    user = '<p>'+data.name+'</p>'
                    + '<p>'+data.lastname+'</p>'
                    + '<p>'+data.username+'</p>'
                    + '<p>'+data.email+'</p>';
                    userSection.innerHTML = user;
                });
            }
        }

    </script>
</body>

</html>