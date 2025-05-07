document.addEventListener("DOMContentLoaded", function () {
    // Verificar si hay una sesión activa
    const usuarioLogueado = sessionStorage.getItem("usuario");

    if (!usuarioLogueado) {
        alert("Debes iniciar sesión para acceder a esta página.");
        window.location.href = "../index.html"; // Redirige al login
    }
});
