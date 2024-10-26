<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        /* Animated Gradient Background */
        .animated-background {
            background: linear-gradient(45deg, #FF48B6, #FFD1DC, #FFB6C1, #FFC0CB);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .btn-primary {
            background-color: #FF48B6;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff60c1;
        }

        .custom-footer {
            color: white;
            padding: 15px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="animated-background">
        <div>
            <h1 class="display-4 fw-bold">Sakinah, Mawaddah, Warrahmah 🙏🏻</h1>
            <p class="lead">Planning your dream wedding with love, passion, and perfection.</p>
            <a href="/" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>

    <footer class="custom-footer">
        <p>© {{ date('Y') }} Sakinah, Mawaddah, Warrahmah | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</body>
</html>
