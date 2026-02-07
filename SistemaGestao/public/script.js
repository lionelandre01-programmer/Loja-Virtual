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