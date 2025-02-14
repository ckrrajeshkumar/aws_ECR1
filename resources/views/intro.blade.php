<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered String and Logo</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .center-content {
            text-align: center;
        }

        .center-content h1 {
            margin: 0;
            font-size: 2rem;
            color: #333;
        }

        .center-content img {
            margin-bottom: 1rem;
            max-width: 100%;
            height: auto;
            width: 150px; /* Adjust as necessary */
        }

        @media (max-width: 600px) {
            .center-content h1 {
                font-size: 1.5rem;
            }

            .center-content img {
                width: 100px;
            }
        }
    </style>
</head>
<body>
<div class="center-content">
    <img src="https://isportz.co/storage/2024/11/logo-with-tagline-Original.webp" alt="Logo">
    <h1>Welcome to iSportz Platform</h1>
</div>
</body>
</html>
