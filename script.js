document.addEventListener('DOMContentLoaded', () => {
    
    const toggleSignUp = document.getElementById('toggleSignUp');
    const toggleSignIn = document.getElementById('toggleSignIn');
    const signUpForm = document.getElementById('signUpForm');
    const signInForm = document.getElementById('signInForm');
    const title = document.getElementById('title');

    
    toggleSignUp.addEventListener('click', () => {
        signUpForm.style.display = 'block';
        signInForm.style.display = 'none';
        toggleSignUp.classList.add('active');
        toggleSignIn.classList.remove('active');
        title.textContent = 'Registro';
    });

    toggleSignIn.addEventListener('click', () => {
        signInForm.style.display = 'block';
        signUpForm.style.display = 'none';
        toggleSignIn.classList.add('active');
        toggleSignUp.classList.remove('active');
        title.textContent = 'Iniciar Sesión';
    });

   
    signUpForm.addEventListener('submit', (e) => {
        e.preventDefault(); 
        handleRegister();
    });

    signInForm.addEventListener('submit', (e) => {
        e.preventDefault(); 
        handleLogin();
    });

    // Manejo de registro
    function handleRegister() {
        if (validateForm(true)) {
            signUpForm.action = "php/registro_usuario_be.php"; 
            signUpForm.submit(); 
        }
    }

    // Manejo de inicio de sesión
    function handleLogin() {
        if (validateForm(false)) {
            signInForm.action = "php/login_usuario_be.php"; 
            signInForm.submit(); 
        }
    }

    // Validación del formulario
    function validateForm(isRegistration) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const name = isRegistration ? document.getElementById('nombre').value : null;

        if (isRegistration && !name) {
            showFeedback('Nombre es requerido', 'error');
            return false;
        }

        if (!email || !password) {
            showFeedback('Todos los campos son requeridos', 'error');
            return false;
        }

        return true;
    }

   
    function showFeedback(message, type) {
        const feedback = document.createElement('div');
        feedback.className = `feedback ${type}`;
        feedback.textContent = message;

        document.body.appendChild(feedback);
        setTimeout(() => feedback.remove(), 3000);
    }
});