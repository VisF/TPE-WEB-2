{include file="templates/header.tpl"}
    <form id="iniciar" action="registrar" method="POST">
        <h1>Registrese</h1>
        <label for="email">Email: </label><input type="text" name="email">
        <label for="pass">Contraseña: </label><input type="password" name="pass">
        <button class="registro">Entrar</button>
    </form>
    
{include file="templates/footer.tpl"}