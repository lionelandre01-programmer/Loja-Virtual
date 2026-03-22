let button = document.querySelector('#btn-response');
let nav = document.querySelector('#menu');
button.addEventListener('click', () => {
    nav.classList.toggle('ativo');

    if (nav.classList.contains('ativo')){

        button.innerHTML = '&#10006';
    }else{
        
        button.innerHTML = '&#9776';
    }
    
});

const slides = document.querySelectorAll('.slide');
let current = 0;

function nextSlide(){
    const currentSlide = slides[current];
    currentSlide.classList.remove('active');
    currentSlide.classList.add('prev');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
    const nextSlide = slides[current];
    nextSlide.classList.add('active');
    setTimeout(() => {
        currentSlide.classList.remove('prev');
    }, 1000);
}

setInterval(nextSlide, 5000);

function senhaForte(){

    const senha = document.getElementById("senha").value;

    if (senha.length < 6){

        document.getElementById("erroSenha").innerHTML = "<p style='color: red'>Senha Curta Demais</p>";
        document.getElementById("buttonSubmit").disabled = true;

    }else{

        document.getElementById("erroSenha").innerHTML = "<p style='color: green'>Senha Válida</p>";
        document.getElementById("buttonSubmit").disabled = false;
    }
}

function coincidirSenha(){
    
    const senha1 = document.getElementById("senha").value;
    const senha2 = document.getElementById("confirmSenha").value;

    if (senha1 === senha2){

        document.getElementById("coincidir").innerHTML = "<p style='color: green'>As Senhas Correspondem</p>";
        document.getElementById("buttonSubmit").disabled = false;
    }else{

        document.getElementById("coincidir").innerHTML = "<p style='color: red'>As Senhas não Correspondem</p>";
        document.getElementById("buttonSubmit").disabled = true;
    }
}

function maiusculo(){

    let firstName = document.getElementById("firstName");
    let lastName = document.getElementById("lastName");

    if (firstName.value && lastName.value){

        let first_names = firstName.value.split(" ");
        let last_names = lastName.value.split(" ");
        firstName.value = first_names.map(f => f.charAt(0).toUpperCase() + f.slice(1).toLowerCase()).join(" ");
        lastName.value = last_names.map(l => l.charAt(0).toUpperCase() + l.slice(1).toLowerCase()).join(" ");
        document.getElementById("buttonSubmit").disabled = false;

    }else if(firstName.value){

        let first_names = firstName.value.split(" ");
        console.log(first_names);
        firstName.value = first_names.map(f => f.charAt(0).toUpperCase() + f.slice(1).toLowerCase()).join(" ");
        document.getElementById("buttonSubmit").disabled = true;
    
    }else{

        let last_names = lastName.value.split(" ");
        lastName.value = last_names.map(l => l.charAt(0).toUpperCase() + l.slice(1).toLowerCase()).join(" ");
        document.getElementById("buttonSubmit").disabled = true;
    }
}
