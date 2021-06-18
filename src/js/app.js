document.addEventListener('DOMContentLoaded', function () {


    eventListeners();
    darkMode();

})  

function darkMode() {

    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (preferDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    
    preferDarkMode.addEventListener('change', () => {
        
        if (preferDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })

    const btnDarkMode = document.querySelector('.btn-dark-mode');

    btnDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {

    //Selector

    const mobileMenu = document.querySelector('.mobile-menu');

    // evento 
    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    //Motrar la navegacion

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');

    }
    // tambien se puede usar navegacion.classList.toggle('mostrar');

}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'Teléfono') {

        //Crear el Input
        let input = document.createElement('INPUT');
        contactoDiv.innerHTML = `

        
                       
        <label for="telefono">Teléfono</label>
        <input name="contacto[telefono]" type="phone" id="telefono" placeholder="Tu Telefono...">

        <p>Elija la fecha y la hora de contacto</p>
            
        <label for="fecha">Fecha</label>
        <input name="contacto[fecha]" type="date" id="fecha">
    
        <label for="hora">Hora</label>
        <input name="contacto[hora]" type="time" id="hora">
       
        `;
    } else if(e.target.value === 'Email') {
        contactoDiv.innerHTML = `
               
        <label for="email">Email</label>
        <input require name="contacto[email]" id="email" type="email" placeholder="Tu Email...">

        `;
    }
    
}