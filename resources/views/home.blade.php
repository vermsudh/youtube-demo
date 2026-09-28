<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Congrats you are logged in</p>
    <form action="/logout" method="POST">
        @csrf 
        <button>Log out</button>
    </form>
    @else
     <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
     </div>

     <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginName" type="text" placeholder="name">

            <input name="loginPassword" type="password" placeholder="password">
            <button>Login</button>
        </form>
     </div>
    @endauth

</body>
</html>