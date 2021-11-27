{include file="templates/header.tpl"}

<div class="fabricante">
    <p>{$fabricante->descripcion}</p>
    <p>{$fabricante->pais}</p>
</div>



{if $user[1] neq '0'}
<form id="editar" method = "POST" action = "fabricantes/{$fabricante->id_fabricante}/editar">
    <div class="formfabri">
        <label for="descripcion">Ingrese la descripcion: </label><input type="text" value="{$fabricante->descripcion}" name="descripcion"/>
        <label for="pais">Ingrese el pais: </label><input type="text" value="{$fabricante->pais}" name="pais"/>
        <button type="submit" class="buttonfabri">Editar</button>   
</form>
        <a href="fabricantes/{$fabricante->id_fabricante}/borrar"><button class="buttonfabri">Borrar fabricante</button></a>
    </div>

{/if}

<h2>Productos del fabricante</h2>

{foreach from=$productos item=$producto}
    <div class="fabricante">
        <a class="vermas"href="productos/{$producto->id_producto}">Ver producto</a>
        <p>Articulo: {$producto->nombre}</p>
        <p>Precio: {$producto->precio}</p>
    </div>

{/foreach}


{include file="templates/footer.tpl"}