<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        /* Colors - Sama seperti welcome page */
        --primary: #4f46e5;
        --primary-dark: #4338ca;
        --primary-light: #6366f1;
        --accent: #f59e0b;
        --accent-dark: #d97706;

        /* Dark Mode */
        --text: #f3f4f6;
        --text-light: #d1d5db;
        --bg: #111827;
        --card: #1f2937;
        --border: #374151;

        /* Light Mode */
        --light-text: #1f2937;
        --light-text-light: #6b7280;
        --light-bg: #f9fafb;
        --light-card: #ffffff;
        --light-border: #e5e7eb;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--light-bg);
        color: var(--light-text);
        transition: all 0.3s ease;
    }

    body.dark-mode {
        background-color: var(--bg);
        color: var(--text);
    }

    .login-container {
        max-width: 400px;
        margin: 100px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        background-color: var(--light-card);
        border: 1px solid var(--light-border);
    }

    .dark-mode .login-container {
        background-color: var(--card);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border);
    }

    .btn-social {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .theme-toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        cursor: pointer;
        font-size: 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        color: var(--light-text);
        border: 1px solid var(--light-border);
        padding: 0.5rem 0.75rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .dark-mode .theme-toggle {
        background: rgba(0, 0, 0, 0.2);
        color: var(--text);
        border: 1px solid var(--border);
    }

    .btn-primary {
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
        border: none;
        color: white;
    }

    .btn-outline-secondary {
        border: 1px solid var(--light-border);
        background-color: transparent;
        color: var(--light-text-light);
    }

    .dark-mode .btn-outline-secondary {
        border: 1px solid var(--border);
        color: var(--text-light);
    }

    .form-control {
        background-color: inherit;
        color: inherit;
        border: 1px solid var(--light-border);
    }

    .dark-mode .form-control {
        border: 1px solid var(--border);
    }

    .form-check-label {
        color: inherit;
    }

    .alert-danger {
        background-color: #fee2e2;
        border-color: #fca5a5;
        color: #991b1b;
    }

    .dark-mode .alert-danger {
        background-color: #7f1d1d;
        border-color: #ef4444;
        color: #fee2e2;
    }
</style>

</head>
<body>
    <div class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </div>

    <div class="login-container">
        <h2 class="text-center mb-4">Login</h2>
        
        @if($errors->any())
            <div class="alert alert-danger">
                These credentials do not match our records.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>
            
            <div class="text-center mb-3">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
            
            <div class="text-center mb-3">or</div>
            
            <div class="social-login">
                <a href="{{ url('/auth/google') }}" class="btn btn-outline-secondary btn-social">
                    <i class="fab fa-google me-2"></i> Login with Google
                </a>
                <a href="{{ url('/auth/github') }}" class="btn btn-outline-secondary btn-social">
                    <i class="fab fa-github me-2"></i> Login with GitHub
                </a>
                <a href="{{ url('/auth/microsoft') }}" class="btn btn-outline-secondary btn-social">
                    <i class="fab fa-microsoft me-2"></i> Login with Microsoft
                </a>
            </div>
        </form>
    </div>

    <script>
        // Dark mode toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        
        // Check for saved theme preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('darkMode', 'enabled');
            } else {
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    </script>
</body>
</html>