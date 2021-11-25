{include file="templates/header.tpl"}
    {foreach from=$usuarios item=$usuario}
    <div>
        <form action='modif' method='POST'>
            <input type='text' name='mail' value='{$usuario->email}' readonly/>
            <p>Admin: {$usuario->admin}</p>
            <button type="submit" class="rol">Cambiar rol</button>
        </form>
        <form action='borrar' method='POST'>
            <p>Id del usuario</p>
            <input type='text' name='id_user' value='{$usuario->id_usuario}' readonly/>
            <button type="submit">Borrar usuario</button>
        </form>
    </div>

{/foreach}
    <h1>{$mensaje}</h1>  
{include file="templates/footer.tpl"}