let datos = document.querySelectorAll('.del-ex .data');
let data = document.querySelectorAll('.del-food .data');

datos.forEach(el=>{
    // console.log(el)
    let button = el.querySelector('img')
    button.addEventListener("click",function(){
        let id = el.querySelector('p').textContent;

        let url = "../include/adminDeleteExercise.php";
        let params = {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'data=' + JSON.stringify({id:id})
        }
        fetch(url,params)
        .then(function(respuesta){
            return respuesta.json();
        }).then(function(datos){
            location.replace(datos)
        })
    })
})

data.forEach(el=>{
    // console.log(el)
    let button = el.querySelector('img')
    button.addEventListener("click",function(){
        let id = el.querySelector('p').textContent;

        let url = "../include/adminDeleteFood.php";
        let params = {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'data=' + JSON.stringify({id:id})
        }
        fetch(url,params)
        .then(function(respuesta){
            return respuesta.json();
        }).then(function(datos){
            location.replace(datos)
        })
    })
})