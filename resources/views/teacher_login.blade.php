@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Teacher Login</h1>
    <form action="/tlogin" method="POST">
    {{ csrf_field() }}
        <input type="text" name="username"><br><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button>  
    </form>
</body>
</html>