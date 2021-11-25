'use strict';

document.addEventListener('DOMContentLoaded', (e) =>{
    let ruta = "api/comentario/";
    let idproducto = window.location.pathname.substr(window.location.pathname.lastIndexOf('/')+1);

    
    async function cargarComentarios(){
        let req = await fetch(ruta + idproducto);
        let res = await req.json();
        mostrarComentarios(res);
        
        
    }

    
    function mostrarComentarios(res){
        let div = document.querySelector('.comentarios');
        div.innerHTML = '';
        if(res){
            res.forEach(comentario=>{div.innerHTML+=`<p class="coment">${comentario.contenido}</p>
                                                    <p class ="coment">${comentario.calificacion}</p>`
                                                    if(document.querySelector('body').dataset.admin == 1){
                                                        div.innerHTML+=`<button type="button" class="borrarComent" name="${comentario.id_comentario}">Borrar</button>`
                                                    }
                                                    });
            let btnborrar = document.querySelectorAll(".borrarComent");
            btnborrar.forEach(btn => {
                btn.addEventListener("click", function(){
                    eliminarComentario(this);
                })
            })
        }
        else{

        }
        
    }
    cargarComentarios();

    async function agregarComentario(){
        let contenido = document.getElementById("contenido").value;
        let puntuacion = document.getElementById("puntuacion").value;
        let comentario = {
            "contenido": contenido,
            "calificacion": puntuacion
        };

        try{
            let res = await fetch(ruta + "/" + idproducto, {
                "method":"POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(comentario)

            });
            let json = await res.json();
            cargarComentarios();
        }
        catch(error){
            console.log(error);
        }
    }

    async function eliminarComentario(comentario){
        let id = comentario.name;
        try{
            let res = await fetch(ruta + "/" + idproducto + "/" + id,{
                "method": "DELETE",
                "headers": { "Content-type": "application/json" },
            });
            let json = await res.json();
            cargarComentarios();
        }
        catch(error){
            console.log(error);
        }
    }




    let agregar = document.querySelector('#agregarComent');
    agregar.addEventListener("submit", (e)=>  {e.preventDefault(); agregarComentario()});
    


});

