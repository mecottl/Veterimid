document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Obtener los valores del formulario
    const correo = document.getElementById('correo').value;
    const contraseña = document.getElementById('contraseña').value;

    const response = await fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ correo, contraseña })
    });

    const data = await response.json();

    if (data.success) {
        sessionStorage.setItem("usuario", JSON.stringify({ correo, rol: data.rol }));

        // Redirigir según el rol del usuario
        if (data.rol === 'Administrador') {
            window.location.href = 'admin.html';
        } else if (data.rol === 'Recepcionista') {
            window.location.href = 'recp.html';
        } else if (data.rol === 'Veterinario') {
            window.location.href = 'vet.html';
        } else if (data.rol === 'Contador') {
            window.location.href = 'conta.html';
        } else {
            alert('Rol enbvdfweno reconocido.');
        }
    } else {
        alert('Credenciales incorrectas.');
    }
});
