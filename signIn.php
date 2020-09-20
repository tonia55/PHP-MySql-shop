<?php

$name = $_POST['name'];
$surname = $_POST['surname'];
$phoneNr = $_POST['phoneNr'];
$email = $_POST['email'];
$password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$registered_at = date("Y-m-d H:i:s");
$last_login_at = date("Y-m-d H:i:s");

$data = $_POST;

if (empty($data['name']) ||
        empty($data['surname']) ||
        empty($data['phoneNr']) ||
        empty($data['email']) ||
        empty($data['password']) ||
        empty($data['confirm_password'])) {

    die('Suveskite visus duomenis');
}

if ($data['password'] !== $data['confirm_password']) {
    die('Slaptažodžiai nesutampa');
}

$link = mysqli_connect("localhost", "root", "", "intellectus");

$sql = "INSERT INTO vartotojai (user_id, email, name, last_name, phone, password,
 registered_at, last_login_at)
VALUES (DEFAULT, '$email', '$name', '$surname', '$phoneNr', '$password', "
        . "'$registered_at', '$last_login_at')";

mysqli_query($link, $sql);

if (mysqli_errno($link)) {
    echo mysqli_error($link);
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="El.paštas"><br>
            <input type="password" name="password" placeholder="Slaptažodis"><br>
            <input type="submit" name="submit" value="Prisijungti">
        </form>       
    </body>
</html>

