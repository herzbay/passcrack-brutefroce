<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Cracking</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: black;
            margin: 0;
        }
        .container {
            background-color: whitesmoke;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        #output {
            margin-top: 20px;
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 15px;
            max-height: 300px;
            overflow-y: auto;
            text-align: left;
            font-family: 'Courier New', Courier, monospace;
            color: #333;
            font-size: 14px;
        }
        .time-result {
            margin-top: 20px;
            padding: 10px;
            font-weight: bold;
            font-size: 18px;
            background-color: #e6ffe6;
            border-radius: 5px;
            color: green;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 20px;
            }
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cracking Password</h1>
        <button id="startBtn">Mulai Percobaan</button>

        <div id="output"></div>
        <div id="timeResult" class="time-result"></div>

        <form method="GET" action="{{ route('login') }}">
            <button type="submit" class="btn-bruteforce">Kembali</button>
        </form>

        <div class="footer">
            Simulasi cracking password dengan metode Brute Force.
        </div>
    </div>

    <script>
        const correctPassword = "3101"; // Password yang benar
        const charset = "0123456789"; // Karakter yang digunakan
        const maxLength = 4; // Panjang password
        const maxAttempts = Math.pow(charset.length, maxLength); // Jumlah kombinasi

        function generatePassword(attempt) {
            let password = '';
            for (let i = 0; i < maxLength; i++) {
                password += charset.charAt((attempt / Math.pow(charset.length, i)) % charset.length);
            }
            return password;
        }

        document.getElementById('startBtn').addEventListener('click', function() {
            let attempt = 0;
            let output = '';
            const startTime = new Date().getTime(); // Waktu mulai

            const interval = setInterval(() => {
                if (attempt < maxAttempts) {
                    const guess = generatePassword(attempt);
                    output += `Percobaan ${attempt + 1}: ${guess} <br>`;
                    document.getElementById('output').innerHTML = output;

                    if (guess === correctPassword) {
                        clearInterval(interval);

                        // Waktu akhir
                        const endTime = new Date().getTime();
                        const timeTaken = (endTime - startTime) / 1000; // Menghitung waktu dalam detik

                        output += `<strong>Password ditemukan: ${guess}!</strong>`;
                        document.getElementById('output').innerHTML = output;

                        // Tampilkan lama waktu yang dihabiskan
                        document.getElementById('timeResult').innerHTML = `Lama waktu untuk menemukan password: ${timeTaken} detik`;
                    }

                    attempt++;
                } else {
                    clearInterval(interval);
                    output += 'Semua percobaan selesai.';
                    document.getElementById('output').innerHTML = output;
                }
            }, 0.1); // Penundaan antara percobaan
        });
    </script>
</body>
</html>
