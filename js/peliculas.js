document.addEventListener("DOMContentLoaded", function(){
"use strict";
document.querySelector("#form-cometarios").addEventListener('submit', addComentarios);


let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        subtitle: "Estas tareas se renderizan desde el cliente usando Vue.js",
        tasks: [], 
        auth: true
    }
});

function GetComentarios() {
    fetch("api/comentarios")
    .then(response => response.json())
    .then(comentarios => {
        app.comentarios = comentarios; 
    })
    .catch(error => console.log(error));
}

function addComentarios(e) {
    e.preventDefault();
    
    let data = {
        comentario:  document.querySelector("textarea[name=comentario]").value,
        puntaje:  document.querySelector("input[name=puntaje]").value,
        
    }

    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
         GetComentarios();
     })
     .catch(error => console.log(error));
}
async function DeleteComentarios(id){ 
    try{
        let r = await fetch('api/peliculas/comentario'+id,{
            "method": "DELETE"
        });
        let json = await r.json();
        console.log(json);
    
        }catch(e){
            console.log(e);
        } 
    }
GetComentarios();

})
