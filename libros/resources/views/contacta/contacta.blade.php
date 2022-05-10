<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSRF Token-->
    <!--<meta name="csrf-token" content="{{csrf_token()}}">-->
    
    <title>Document</title>
</head>
<body>
    
    <h1>Correo electrónico</h1>

    <p><strong>Nombre: </strong>{{$contacto['name'] }}</p>
    <p><strong>Email: </strong>{{$contacto['email'] }}</p>
    <p><strong>Mensaje: </strong>{{$contacto['mensaje'] }}</p>
    

    
</body>
</html>