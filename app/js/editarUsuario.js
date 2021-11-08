let editName = document.querySelector('.nombre')
let editLastName = document.querySelector('.apellido')
let editUsername = document.querySelector('.username')
let edit = document.querySelectorAll('.edit')
let save = document.querySelector('.save')

function sendData(data){
let url = "../include/editUserInfo.php";
let params = {
    method: 'post',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'data=' + JSON.stringify(data)
}
fetch(url,params)
.then(function(respuesta){
    return respuesta.json();
}).then(function(datos){

    url = window.location.search
    url = url.substr(0,url.lastIndexOf("?"));
    
    if(datos == "exito"){
        if(url == ""){
            location.replace('perfil.php'+window.location.search)
        }else{
            location.replace('perfil.php'+url)
        }
    }
    if(datos == "vacio"){
        if(url == ""){
            location.replace('perfil.php'+window.location.search+"?err=empty")
        }else{
            location.replace('perfil.php'+url+"?err=empty")
        }
    }
    if(datos == "no valido"){
        if(url == ""){
            location.replace('perfil.php'+window.location.search+"?err=usernametaken")
        }else{
            location.replace('perfil.php'+url+"?err=usernametaken")
        }
    }
    if(datos == "error"){
        if(url == ""){
            location.replace('perfil.php'+window.location.search+"?err=error")
        }else{
            location.replace('perfil.php'+url+"?err=error")
        }
    }
})
}


function guardar(btn){
btn.addEventListener("click",function(){
    data = {}
    let inputs = document.querySelectorAll('input')
    inputs.forEach(el=>{
        if (el.name == "nombre"){
            data.nombre = el.value
        }
        if (el.name == "apellidos"){
            data.apellidos = el.value
        }
        if (el.name == "username"){
            data.username = el.value
        }
    })
    sendData(data)
    editarDatos()
})
}

// console.log(edit)
function editarDatos(){
edit.forEach(el=>{
    el.addEventListener("click",function(){
        save.textContent = ""
        let input = document.createElement('input')
        let button = document.createElement('button')
        input.type = "text"
        button.type = "submit"
        button.textContent="Guardar"
        if(this == editName){
            let p = document.querySelector('.nombretr p')
            input.value = p.textContent 
            input.name = "nombre"
            p.textContent = ""
            p.append(input)
        }
        if(this == editLastName){
            let p = document.querySelector('.apellidotr p')
            input.value = p.textContent 
            p.textContent = ""
            input.name = "apellidos"
            p.append(input)
        }
        if(this == editUsername){
            let p = document.querySelector('.usernametr p')
            input.value = p.textContent 
            p.textContent = ""
            input.name = "username"
            p.append(input)
        }
        save.append(button)
        guardar(button)
    })
})
}


window.addEventListener('load', function(){
editarDatos()
})