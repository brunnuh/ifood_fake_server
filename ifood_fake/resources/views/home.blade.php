<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .ifood{
            text-align: center;
            font-size: 110px;
            color: white;
            padding-top: 20%;
        }
        body{
            background-image: radial-gradient(#DA1B23, #ed5055);
        }
        .login{
            text-align: right;
        }
        a{

            display: inline-block;
            background-color: #FFFFFF;
            color: #f44336;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-left: 20px;
            opacity: 0.9;

        }
        a:hover{
            color: white;
            background-color: red;
            opacity: 1;
        }
    </style>
</head>
<body>
    <header>
        <div class="login">
            <a href="{{route("login")}}">Logar</a>
        </div>
        <div class="ifood">Ifood Fake</div>
    </header>
</body>
</html>
