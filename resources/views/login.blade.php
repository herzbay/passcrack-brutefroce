<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: goldenrod;
        }
        .login-container {
            background-color: whitesmoke;
            padding: 80px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label, input, button {
            display: block;
            width: 100%;
        }
        input[type="text"], input[type="password"] {
            padding: 12px; 
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            padding: 12px; 
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        .success {
            color: green;
            margin-top: 10px;
            text-align: center;
        }
        .extra-buttons {
            margin-top: 20px;
            text-align: center;
        }
        .extra-buttons button {
            margin-top: 10px;
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="/login">
            @csrf
            <label for="username">Enter Username:</label>
            <input type="text" id="username" name="username" maxlength="6" placeholder="Masukkan username" required>

            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" maxlength="4" placeholder="Masukkan password" required>

            <button type="submit">Login</button>
        </form>

        <!-- Tampilkan pesan sukses atau error -->
        @if(session('status') === 'success')
            <div class="success">
                {{ session('message') }}
            </div>
        @elseif(session('status') === 'error')
            <div class="error">
                {{ session('message') }}
            </div>
        @endif

        <div class="extra-buttons">
            <button onclick="window.location.href='/bruteforce'">Cracking Password</button>
        </div>
    </div>
</body>
</html>
