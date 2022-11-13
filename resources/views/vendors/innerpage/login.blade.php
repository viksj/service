<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Login</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <input type="text" name="email" id="vendor_email" placeholder="Enter email" />
        <input type="password" name="password" id="vendor_password" placeholder="password" />
        <input type="submit" value="Login">
    </form>
</body>
</html>
