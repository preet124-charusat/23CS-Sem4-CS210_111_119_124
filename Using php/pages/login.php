<?php
// session_start();
// if (isset($_SESSION['user_id'])) {
//     header("Location: index.php");
//     exit();
// }
?>

<div class="auth-container fade-in">
    <h2>Welcome to JobRecruit</h2>
    <div class="auth-tabs">
        <button class="auth-tab active" data-tab="login">Login</button>
        <button class="auth-tab" data-tab="signup">Sign Up</button>
    </div>
    <form id="login-form" class="auth-form active">
        <div class="form-group">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" required>
        </div>
        <div class="remember-me">
            <label for="remember">Remember Me</label>
            <input type="checkbox" id="remember" name="remember">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <form id="signup-form" class="auth-form">
        <div class="form-group">
            <label for="signup-username">Username</label>
            <input type="text" id="signup-username" name="username" required>
        </div>
        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" id="signup-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" id="signup-password" name="password" required>
        </div>
        <div class="form-group">
            <label for="signup-confirm-password">Confirm Password</label>
            <input type="password" id="signup-confirm-password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <div class="social-login">
        <button class="btn btn-google">
            <i class="fab fa-google"></i> Login with Google
        </button>
        <button class="btn btn-linkedin">
            <i class="fab fa-linkedin"></i> Login with LinkedIn
        </button>
    </div>
    <p id="auth-message"></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const authMessage = document.getElementById('auth-message');
        const authTabs = document.querySelectorAll('.auth-tab');

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePassword(password) {
            return password.length >= 8;
        }

        function showMessage(message, isError = false) {
            authMessage.textContent = message;
            authMessage.className = isError ? 'error-message' : 'success-message';
        }

        authTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                authTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                if (tab.dataset.tab === 'login') {
                    loginForm.classList.add('active');
                    signupForm.classList.remove('active');
                } else {
                    signupForm.classList.add('active');
                    loginForm.classList.remove('active');
                }
                authMessage.textContent = '';
            });
        });

        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = loginForm.email.value;
            const password = loginForm.password.value;

            if (!validateEmail(email)) {
                showMessage('Please enter a valid email address', true);
                return;
            }

            if (!validatePassword(password)) {
                showMessage('Password must be at least 8 characters long', true);
                return;
            }

            try {
                const response = await fetch('auth.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ action: 'login', email, password }),
                });
                const result = await response.json();
                if (result.success) {
                    showMessage(result.message);
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 2000);
                } else {
                    showMessage(result.message, true);
                }
            } catch (error) {
                showMessage('An error occurred. Please try again.', true);
            }
        });

        signupForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = signupForm.username.value;
            const email = signupForm.email.value;
            const password = signupForm.password.value;
            const confirmPassword = signupForm.confirm_password.value;

            if (!validateEmail(email)) {
                showMessage('Please enter a valid email address', true);
                return;
            }

            if (!validatePassword(password)) {
                showMessage('Password must be at least 8 characters long', true);
                return;
            }

            if (password !== confirmPassword) {
                showMessage('Passwords do not match', true);
                return;
            }

            try {
                const response = await fetch('auth.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ action: 'signup', username, email, password }),
                });
                const result = await response.json();
                if (result.success) {
                    showMessage(result.message);
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 2000);
                } else {
                    showMessage(result.message, true);
                }
            } catch (error) {
                showMessage('An error occurred. Please try again.', true);
            }
        });

        // Social login buttons (placeholder functionality)
        document.querySelector('.btn-google').addEventListener('click', () => {
            alert('Google login functionality to be implemented');
        });

        document.querySelector('.btn-linkedin').addEventListener('click', () => {
            alert('LinkedIn login functionality to be implemented');
        });
    });
</script>

<style>
    .auth-container {
        max-width: 400px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: var(--bg-color);
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .auth-container h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: var(--primary-color);
    }

    .auth-tabs {
        display: flex;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid var(--border-color);
    }

    .auth-tab {
        flex: 1;
        padding: 0.75rem;
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .auth-tab.active {
        border-bottom: 2px solid var(--primary-color);
        color: var(--primary-color);
    }

    .auth-form {
        display: none;
    }

    .auth-form.active {
        display: block;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        font-size: 1rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .remember-me input {
        margin-right: 0.5rem;
    }

    .btn {
        width: 100%;
        padding: 0.75rem;
        font-size: 1rem;
        font-weight: bold;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-color-dark);
    }

    .social-login {
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-google,
    .btn-linkedin {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-google {
        background-color: #db4437;
        color: white;
    }

    .btn-linkedin {
        background-color: #0077b5;
        color: white;
    }

    #auth-message {
        margin-top: 1rem;
        text-align: center;
        font-weight: bold;
    }

    .error-message {
        color: #dc3545;
    }

    .success-message {
        color: #28a745;
    }
</style>