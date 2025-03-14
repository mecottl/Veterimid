document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtener el valor ingresado en el campo de usuario
    const username = document.getElementById('username').value.toLowerCase();
    const password = document.getElementById('password').value.toLowerCase();


    // Validar el tipo de usuario y redirigir a la interfaz correspondiente
    if (username === 'admi' && password == 'si') {
        window.location.href = 'admin.html'; // Redirige a la interfaz de administrador
    } else if (username === 'recepcionista') {
        window.location.href = 'recp.html'; // Redirige a la interfaz de gerente
    } else if (username === 'veterinario') {
        window.location.href = 'vet.html';
    } else if (username === 'admin') {
            window.location.href = 'admin.html';
    } else {
        alert('Usuario no reconocido. Por favor, verifica tus credenciales.');
    }
});