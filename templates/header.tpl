<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trueque</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <link href="templates/styles.css" rel="stylesheet" />
</head>

<body>
    
    <header>
        <nav>
            <ul class="menu">
                <li><a href="productos">Productos</a></li>
                <li><a href="fabricantes">Fabricantes</a></li>
                <li><p>Bienvenido <p>{$email}</li>
                {if $email neq 'invitado'}
                    <li><a href="logout"><button class="logout">Logout</button></a></li>
                {else}
                    <li><a href="login"><button class="login">Iniciar Sesion</button></a></li>
                {/if}
            </ul>
        </nav>
    </header>
    

