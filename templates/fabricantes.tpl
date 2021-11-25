{include file="templates/header.tpl"}
<div class="pagina">
{if $user[1] neq '0'}
<form id="agregar" method="POST"action="agregarFabricante">
    <div class="formulario">
        <label for="descripcion">Ingrese la descripcion: </label><input type="text" name="descripcion"/>
        <label for="pais">Ingrese el pais: </label><input type="text" name="pais"/>
        <button type="submit" class="agregar">Agregar</button>
    </div>
</form>
{/if}

{foreach from=$fabricantes item=$fabricante}
    <div class="fabricantes">
        <p>{$fabricante->descripcion}</p>
        <p>{$fabricante->pais}</p>
        <a href="fabricantes/{$fabricante->id_fabricante}"><button class="vermas">Ver mas</button></a>
    </div>
{/foreach}




{include file="templates/footer.tpl"}