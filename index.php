<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }

        .image-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
}

        .container {
            position: relative;
            width: 400px;
            background-color: rgba(34, 34, 34, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            transition: transform 0.3s;
            flex-grow: 1;
        }

        h1 {
            color: #E50914;
            margin-bottom: 20px;
        }

        .logo {
            width: 200px;
            height: auto;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #E50914;
            border-radius: 5px;
            background-color: #333;
            color: white;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #E50914;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #f0a3a0;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: gray;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
            }

            .logo {
                width: 80px;
            }

            h1 {
                font-size: 1.5em;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
</body>
    <div class="container">
        <img src="data/images/hacker.jpg" alt="Logo" class="logo">
        <h1>BIENVENUE</h1>
        <form action="data.php" method="post">
            <button type="submit">Accéder au site</button>
        </form>
    </div>

    <div class="footer">
        <a href="#">Informations légales</a>
        <a href="#">Confidentialité</a>
        <a href="#">Garantie légale</a>
        <a href="#">Mentions légales</a>
        <a href="#">Conditions d'utilisation</a>
    </div>
<script>
    const images = [
        'data/films/squidgame1.jpeg',
        'data/films/squidgame2.jpeg',
        'data/films/squidgame3.jpeg'
    ];
    const randomImage = images[Math.floor(Math.random() * images.length)];
    const imageBackground = document.createElement('div');
    imageBackground.style.position = 'fixed';
    imageBackground.style.top = '0';
    imageBackground.style.left = '0';
    imageBackground.style.width = '100%';
    imageBackground.style.height = '100%';
    imageBackground.style.backgroundImage = `url(${randomImage})`;
    imageBackground.style.backgroundSize = 'cover';
    imageBackground.style.zIndex = '-1';
    document.body.appendChild(imageBackground);
</script>
</body>
</html>
