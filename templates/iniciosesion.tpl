{include file="templates/header.tpl"}
    <form id="iniciar" action="verificar" method="POST">
        <h1>Inicie sesion</h1>
        <label for="email">Email: </label><input type="text" name="email" value="admin@admin.com">
        <label for="pass">Contraseña: </label><input type="password" name="pass" value="12345">
        <button class="iniciarsesion">Entrar</button>
    </form>
    <li><a href="form"><button class="registrarse">Registrarse</button></a></li>
    
{include file="templates/footer.tpl"}