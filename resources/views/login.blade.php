<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - GS2E</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .logo-container {
            background: white;
            padding: 20px;
            border-radius: 15px;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .logo-container img {
            max-width: 200px;
            height: auto;
            display: block;
        }

        .login-header h1 {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        .login-body {
            padding: 40px 30px;
        }

        .alert {
            background: #fee;
            border-left: 4px solid #f44336;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert::before {
            content: '⚠';
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .input-wrapper input::placeholder {
            color: #aaa;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 20px;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #667eea;
            font-size: 20px;
            user-select: none;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #764ba2;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-top: 15px;
            gap: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login-footer a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                max-width: 100%;
                margin: 10px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }

            .login-header p {
                font-size: 14px;
            }

            .logo-container {
                padding: 15px;
            }

            .logo-container img {
                max-width: 150px;
            }

            .login-body {
                padding: 30px 20px;
            }

            .input-wrapper input {
                padding: 13px 18px;
                font-size: 14px;
            }

            .btn-login {
                padding: 14px;
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .login-header {
                padding: 25px 15px;
            }

            .login-header h1 {
                font-size: 22px;
            }

            .logo-container img {
                max-width: 130px;
            }

            .login-body {
                padding: 25px 15px;
            }
        }

        /* Animation de chargement */
        .btn-login.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            right: 20px;
            margin-top: -10px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <img src="path/to/your/logo.png" alt="GS2E Logo">
            </div>
            <h1>Bienvenue</h1>
            <p>Connectez-vous à votre espace pour accéder à vos services</p>
        </div>

        <div class="login-body">
            @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert">
                Veuillez vous connecter avant d'accéder à votre tableau de bord.
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="votreemail@example.com"
                            value="{{ old('email') }}"
                            required 
                            autofocus
                        >
                        <span class="input-icon">📧</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-wrapper password-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••"
                            required
                        >
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="showPassword" onchange="togglePasswordCheckbox()">
                        <label for="showPassword">Afficher le mot de passe</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    Se connecter
                </button>

                <div class="login-footer">
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility avec l'icône
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            const checkbox = document.getElementById('showPassword');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
                checkbox.checked = true;
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
                checkbox.checked = false;
            }
        }

        // Toggle password visibility avec la checkbox
        function togglePasswordCheckbox() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            const checkbox = document.getElementById('showPassword');
            
            if (checkbox.checked) {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        // Animation du bouton lors de la soumission
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.querySelector('.btn-login');
            btn.classList.add('loading');
            btn.textContent = 'Connexion en cours...';
        });
    </script>
</body>
</html>