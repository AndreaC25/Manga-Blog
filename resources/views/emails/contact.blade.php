<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <style>
        body 
        {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .header 
        {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        .body 
        {
            padding: 20px;
        }

        .label 
        {
            font-weight: bold;
        }

        .message-box 
        {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            background-color: #f9f9f9;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h2 style="margin:0;">Manga Blog </h2>
    </div>

    <div class="body">
        <p>Hai ricevuto un nuovo messaggio di contatto:</p>
        <p><span class="label">Nome:</span> {{ $name }}</p>
        <p><span class="label">Email:</span> {{ $email }}</p>
        <p><span class="label">Messaggio:</span></p>
        <div class="message-box">
            {{ $body }}
        </div>

        <hr style="margin-top:30px;">
        <p style="color:#888; font-size:12px;">Questo messaggio è stato inviato da Manga-blog</p>

    </div>
</body>
</html>