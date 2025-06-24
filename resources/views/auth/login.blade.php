<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .login-container { width: 320px; margin: 80px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="email"], input[type="password"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background-color: #3490dc; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: #e3342f; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Acceso al sistema</h1>
        @if ($errors->any())
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" required autofocus>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
