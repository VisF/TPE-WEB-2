{include file="templates/header.tpl"}

<div class="producto">
    <p>{$producto->nombre}</p>
    <p>{$producto->precio}</p>
    <p>{$producto->descripcion}</p>
    <p>{$producto->pais}</p>
</div>
<a href="fabricantes/{$producto->id_fabricante}">Ver fabricante</a>


{if $user[1] neq '0'}
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
    <a href="productos/{$producto->id_producto}/borrar"><button class="borrar">Borrar producto</button></a>


{/if}
{if $user[0] neq 'invitado'}
    <h3 class="titulocoment">Deje su comentario</h3>
        <form id="agregarComent">
            <label for="contenido">Comentario: </label><input type="text" id="contenido" name="contenido"/>
            <label for="puntuacion">Calificacion: </label><input type="number" id="puntuacion" name="puntuacion"/>
            <button type="submit" class="enviar">Enviar</button>
        </form>
    {/if}
<div class="comentarios">
    
</div>

<script src="templates/apicomentarios.js"></script>
{include file="templates/footer.tpl"}