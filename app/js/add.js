fetch('../js/food.json').then((response)=>{
    console.log('resolved',response);
    return response.json()
}).then(data=>{
    console.log(data)
    alimentos = data
}).catch(err=>{
    console.log('rejected',err)
})

let val;
let bus = document.querySelector('#alimento')
let pal = document.querySelector('#palabras')
function damePalabras(raiz){
    let min = raiz.charAt(0).toUpperCase() + raiz.slice(1);
    palabras=[]
    if (raiz!=""){
      for (var i=0;i<alimentos.length;i++){
        if (alimentos[i].indexOf(min)==0){
          palabras.push(alimentos[i])
        }
      }
    }
    return palabras
}

if(bus!=null && pal!=null){
    bus.addEventListener('keyup',function(e){
        var cont = this.value;
        val = cont
        pal.textContent = "";
        aux = damePalabras(cont)
        Array.from(aux).forEach(el=>{
            let li = document.createElement('li')
            li.textContent = el;
            pal.appendChild(li)
            li.addEventListener('click',function(){               
                bus.value = this.textContent
                pal.textContent = "";
                val = el
            })
        })
        if (e.keyCode === 13) {
            if(bus.value.length==0){
                console.log('vacio')
            }else{
                let a = window.location.search;
                let aux = a.replace('?','&');
                val = val.charAt(0).toUpperCase() + val.slice(1)
                location.replace('search.php?search='+val+aux)
            }
        }
    })
}
let icon = document.querySelector('.icon')
icon.addEventListener('click',function(){
    console.log('click')
     if(bus.value.length==0){
        console.log('vacio')
    }else{
        let a = window.location.search;
        let aux = a.replace('?','&');
        val = val.charAt(0).toUpperCase() + val.slice(1)
        location.replace('search.php?search='+val+aux)
    }
})