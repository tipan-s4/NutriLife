let datos = document.querySelectorAll('.datos');

datos.forEach(el=>{
    // console.log(el)
    let button = el.querySelector('img')
    button.addEventListener("click",function(){
        let id = el.querySelector('.idejercicio');
        idejercicio = id.textContent

        let url = "../include/deleteExercise.php";
        let params = {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'data=' + JSON.stringify({id:idejercicio})
        }
        fetch(url,params)
        .then(function(respuesta){
            return respuesta.json();
        }).then(function(datos){
            location.replace(datos)
        })
    })
})