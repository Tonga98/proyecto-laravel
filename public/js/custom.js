// Obtener todos los enlaces con la clase "open-modal"
const modalLinks = document.querySelectorAll('.open-modal');

// Agregar un event listener a cada enlace
modalLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        // Obtener el ID del modal desde el atributo data-modal-target
        const modalId = link.getAttribute('data-modal-target');
        console.log('Modal ID:', modalId); // Agrega este console.log para verificar el ID obtenido

        // Obtener el modal correspondiente
        const modal = document.querySelector(modalId);
        console.log('Modal:', modal); // Agrega este console.log para verificar el modal seleccionado

        // Abrir el modal agregando la clase "open" y eliminando la clase "hidden"
        modal.classList.add('open');
        modal.classList.remove('hidden');
    });
});

// Cerrar el modal al hacer clic fuera del contenido
document.addEventListener('click', (event) => {
    const modalContent = document.querySelector('.modal .modal-content');

    // Verificar si se hizo clic fuera del contenido del modal
    if (!modalContent.contains(event.target)) {
        // Cerrar todos los modales abiertos
        const openModals = document.querySelectorAll('.modal.open');
        openModals.forEach(modal => {
            modal.classList.remove('open');
            modal.classList.add('hidden');
        });
    }
});
