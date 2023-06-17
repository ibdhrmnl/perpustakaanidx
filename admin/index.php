<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleform.css?v=2">
</head>

<body>
    <div class="container">
        <div class="left">
            <img src="edu.png" alt="">
        </div>
        <div class="login">
            <form class="" action="cekadmin.php" method="POST">
                <img class="logo_container" src="logo.png" alt="">
                <h1>Login Admin</h1>
                <hr>
                <p>Silahkan masukkan username dan password yang telah terdaftar.</p>
                <label for="">Username</label>
                <input class="text" type="text" id="text" placeholder="Username" name="username">
                <label for="">Password</label>
                <input class="text" type="password" id="text" placeholder="Password" name="password">
                <input type="submit" name="login" value="Masuk" class="button"></input>
            </form>
        </div>
    </div>
</body>
</html>