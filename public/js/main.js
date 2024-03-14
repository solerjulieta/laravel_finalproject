const d = document;
closeIcon = d.querySelector(".close");
const alerta = d.getElementById('alert');

closeIcon.addEventListener('click', () => {
    alerta.style.display = 'none';
});

setTimeout(() => {
    alerta.style.display = 'none';
}, 5000);