{include file="templates/header.tpl"}

<div class="fabricante">
    <p>{$fabricante->descripcion}</p>
    <p>{$fabricante->pais}</p>
</div>



{if $email neq 'invitado'}
<form id="editar" method = "POST" action = "fabricantes/{$fabricante->id_fabricante}/editar">
    <label for="descripcion">Ingrese la descripcion: </label><input type="text" value="{$fabricante->descripcion}" name="descripcion"/>
    <label for="pais">Ingrese el pais: </label><input type="text" value="{$fabricante->pais}" name="pais"/>
    <button type="submit" class="editar">Editar</button>
</form>
    <a href="fabricantes/{$fabricante->id_fabricante}/borrar"><button class="borrar">Borrar</button></a>


{/if}

<h2>Productos del fabricante</h2>

{foreach from=$productos item=$producto}
    <div>
        <a href="productos/{$producto->id_producto}">Ver producto</a>
        <p>Articulo: {$producto->nombre}</p>
        <p>Precio: {$producto->precio}</p>
    </div>

{/foreach}


{include file="templates/footer.tpl"}