
let lineas = document.querySelector('.lines')
let body = document.querySelector('body')
let container = document.querySelector('.container')
let content = document.querySelector('.content')
let night = document.querySelector('.night')
let ppc = document.querySelectorAll('.ppc-percents')

window.addEventListener('load', function () {
    if (localStorage.getItem('nightmode') == 0) {
        body.classList.remove('nightmode')
        body.classList.add('lightmode')
        container.classList.remove('nightmode')
        container.classList.add('lightmode')
        if(ppc){
            ppc.forEach(el=>{
                el.style.background = "white"
            })
        }
    } else {
        body.classList.remove('lightmode')
        body.classList.add('nightmode')
        container.classList.remove('lightmode')
        container.classList.add('nightmode')
        if(ppc){
            ppc.forEach(el=>{
                el.style.background = "#0f121f"
            })
        }
        
    }


    night.addEventListener('click', function () {
        if (localStorage.getItem('nightmode') == 1) {
            body.classList.remove('nightmode')
            body.classList.add('lightmode')
            container.classList.remove('nightmode')
            container.classList.add('lightmode')
            localStorage.setItem('nightmode', 0)
            ppc.forEach(el=>{
                el.style.background = "white"
            })
        } else {
            body.classList.remove('lightmode')
            body.classList.add('nightmode')
            container.classList.remove('lightmode')
            container.classList.add('nightmode')
            localStorage.setItem('nightmode', 1)
            if(ppc){
                ppc.forEach(el=>{
                    el.style.background = "#0f121f"
                })
            }
        }
    })

})