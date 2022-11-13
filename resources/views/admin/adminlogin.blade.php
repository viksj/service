<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>
    <div>
        <form action="{{ url('admin/login') }}" method="post">
            @csrf
            <input type="email" name="email" id="email" placeholder="Email"/>
            <input type="password" name="password" id="password" placeholder="Password"/>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
