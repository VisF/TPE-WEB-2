{include file="templates/header.tpl"}

<div class="producto">
    <p>{$producto->nombre}</p>
    <p>{$producto->precio}</p>
    <p>{$producto->descripcion}</p>
    <p>{$producto->pais}</p>
</div>
<a href="fabricantes/{$producto->id_fabricante}">Ver fabricante</a>



{if $email neq 'invitado'}
<form id="editar" method="POST" action="productos/{$producto->id_producto}/editar">
    <label for="nombre">Ingrese el nombre: </label><input type="text" value="{$producto->nombre}" name="nombre"/>
    <label for="precio">Ingrese el precio: </label><input type="number" value="{$producto->precio}" name="precio"/>
    <select name="fabricante">
        {foreach from=$fabricantes item=$fabricante}
        <option value="{$fabricante->id_fabricante}"
            {if $producto->id_fabricante eq $fabricante->id_fabricante} selected {/if}
        >{$fabricante->descripcion}</option>
        {/foreach}
    </select>
    <button type="submit" class="editar">Editar</button>
</form>
    <a href="productos/{$producto->id_producto}/borrar"><button class="borrar">Borrar</button></a>


{/if}
{include file="templates/footer.tpl"}