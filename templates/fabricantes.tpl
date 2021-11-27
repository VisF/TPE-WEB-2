{include file="templates/header.tpl"}
<div class="pagina">
{if $user[1] neq '0'}
<form id="agregar" method="POST"action="agregarFabricante">
    <div class="formulario">
        <label for="descripcion">Ingrese la descripcion: </label><input type="text" name="descripcion"/>
        <label for="pais">Ingrese el pais: </label><input type="text" name="pais"/>
        <button type="submit" class="botheader">Agregar</button>
    </div>
</form>
{/if}

<table>
    <thead>
        <tr>
            <th>Fabricante</th>
            <th>Pais de origen</th>
            <th>Mas informacion</th>
        <tr>
    <thead>
    <tbody>
    {foreach from=$fabricantes item=$fabricante}
        <tr class="fabricantes">
            <td>{$fabricante->descripcion}</td>
            <td>{$fabricante->pais}</td>
            <td><a href="fabricantes/{$fabricante->id_fabricante}"><button class="botheader">Ver mas</button></a></td>
        </tr>
    {/foreach}
    </tbody>
</table>


{include file="templates/footer.tpl"}