{include file="templates/header.tpl"}
<div class="pagina">
{if $email neq "invitado"}
<form id="agregar" method="POST"action="agregarProducto">
    <div class="formulario">
        <label for="nombre">Ingrese el nombre: </label><input type="text" name="nombre"/>
        <label for="precio">Ingrese el precio: </label><input type="number" name="precio"/>
        <select name="fabricante">
            {foreach $fabricantes as $fabricante}
                <option value="{$fabricante->id_fabricante}">{$fabricante->descripcion}</option>
            {/foreach}
        </select>
        <button type="submit" class="agregar">Agregar</button>
    </div>
</form>
{/if}
<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Fabricante</th>
            <th>Ver mas</th>
        </tr>
    </thead>
    
    <tbody>
        {foreach $productos as $producto}
                <tr class="productos">
                    <td> {$producto->nombre}</td>
                    <td> {$producto->descripcion} </td>
                    <td> <a href="productos/{$producto->id_producto}"><button class="vermas">Ver mas</button> </a></td>
                    
                </tr>
        {/foreach}

    </tbody>

       

</table>
{include file="templates/footer.tpl"}