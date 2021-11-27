{include file="templates/header.tpl"}
    {foreach from=$usuarios item=$usuario}
    <div>
        <form action='modif' method='POST'>
            <div class="userpage">
                <p>Mail del usuario</p>
                <input type='text' name='mail' value='{$usuario->email}' readonly/>
                <p>Admin: {$usuario->admin}</p>
                <button type="submit" class="botonusuarios">Cambiar rol</button>
            </div>
        </form>
        <form action='borrar' method='POST'>
            <div class="userpage">
                <p>Id del usuario</p>
                <input class="inputid"type='text' name='id_user' value='{$usuario->id_usuario}' readonly/>
                <button type="submit" class="botonusuarios">Borrar usuario</button>
            </div>
        </form>
    </div>

{/foreach}
    <h1>{$mensaje}</h1>  
{include file="templates/footer.tpl"}