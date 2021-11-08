const inputs = document.querySelectorAll('.register input')
let btn = document.querySelector('.register button')

const patterns = {
    nombre: /^[a-z]{3,15}$/i,
    apellidos:  /(^[a-z]{3,15})([\ ][a-z]{3,15})?$/i,
    usuario: /^[\w]{3,12}$/i,
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    pswd: /^[\w@-]{8,20}$/,
    edad: /^([1-9][1-9]|[0-9][0-9])$/,
    peso: /^([1-9][1-9]|[0-9][0-9])$/,
}


function validate(field, regex) {
    if (regex.test(field.value)) {
        field.classList.remove('invalid')
        field.classList.add('valid')
        btn.setAttribute("class", "enviar")
    }
    else {
        field.classList.remove('valid')
        field.classList.add('invalid')
        btn.setAttribute("class", "invalido")
    }
}

console.log(inputs)
inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {
        console.log(e.target.name)
        validate(e.target, patterns[e.target.name])
    })
})

btn.addEventListener("click",function(e){
    if (this.className == 'invalido') {
        e.preventDefault()
        document.querySelector('.regex p').textContent = "Comprueba que todos los datos son correctos"
    }
})