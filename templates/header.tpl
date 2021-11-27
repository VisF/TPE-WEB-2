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

<body data-admin = '{$user[1]}'>
    
    <header>
        <nav>
            <ul class="menu">
                <li><a class="botheader" href="productos">Productos</a></li>
                <li><a class="botheader" href="fabricantes">Fabricantes</a></li>
                <li><p>Bienvenido/s <p>{$user[0]}</li>
                {if $user[0] neq 'invitado'}
                    <li><a href="logout"><button class="botheader">Logout</button></a></li>
                {else}
                    <li><a href="login"><button class="botheader">Iniciar Sesion</button></a></li>
                {/if}
                {if $user[1] neq '0'}
                    <li><a href="admin"><button class="botheader">Ver usuarios</button></a></li>
                {/if}
                
            </ul>
        </nav>
    </header>
    