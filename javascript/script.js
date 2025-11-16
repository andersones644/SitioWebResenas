// Mostrar/ocultar contraseña en todos los formularios
document.querySelectorAll('.input-icon-wrapper').forEach(wrapper => {
    const toggle = wrapper.querySelector('.togglePassword');
    const input = wrapper.querySelector('.password-input');

    if (!toggle || !input) return;

    toggle.addEventListener('click', () => {
        if (input.type === 'password') {
            input.type = 'text';
            toggle.classList.remove('fa-eye');
            toggle.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            toggle.classList.remove('fa-eye-slash');
            toggle.classList.add('fa-eye');
        }
    });
});

// Validación de contraseña al enviar el formulario
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', (e) => {
        const passwordInput = form.querySelector('.password-input');
        if (!passwordInput) return;

        const password = passwordInput.value;
        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

        if (!pattern.test(password)) {
            e.preventDefault();
            alert("La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.");
            passwordInput.focus();
        }
    });
});

// Logout
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("btnLogout");
    if (!btn) return;

    btn.addEventListener("click", e => {
        e.preventDefault();
        if (confirm("¿Seguro que deseas cerrar sesión?")) {
            const path = window.location.pathname;
            if (path === "/" || path.endsWith("index.php") || path.includes("login")) {
                window.location.href = "login/logout.php";
            } else {
                window.location.href = "../login/logout.php";
            }
        }
    });
});
