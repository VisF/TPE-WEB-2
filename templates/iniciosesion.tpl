{include file="templates/header.tpl"}
    <h1 id="titulologin">Inicie sesion</h1>
    <form id="iniciar" action="verificar" method="POST">
        <label for="email">Email: </label><input type="text" name="email" value="admin@admin.com">
        <label for="pass">Contraseña: </label><input type="password" name="pass" value="12345">
        <button class="botonlogin">Entrar</button>
    </form>
    <p class="registrop">No estas registrado?</p>
    <li><a href="form"><button class="registrarse">Registrese</button></a></li>
    
{include file="templates/footer.tpl"}