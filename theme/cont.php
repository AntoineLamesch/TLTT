



<?php 

session_start();
require_once(__DIR__ . '/vendor/autoload.php');
use \Mailjet\Resources;
define('API_PUBLIC_KEY', '84513b1e803757adc68fd8f916ada06d');
define('API_PRIVATE_KEY', '89184200903be7837b9ddd084605057e');
$mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY,true,['version' => 'v3.1']);


if(!empty($_POST['name'])  && !empty($_POST['email']) && !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $body = [
        'Messages' => [
        [
            'From' => [
            'Email' => "antoine.lamesch@live.fr",
            'Name' => "Antoine"
            ],
            'To' => [
            [
                'Email' => "antoine.lamesch@live.fr",
                'Name' => "Guillaume"
            ]
            ],
            'Subject' => "Message du site de Ping Pong de $name $email",
            'TextPart' => 'Réponse enregistrée', 
            'HTMLPart' => "<h3> message : $message  <img src ='C:\wamp64\www\tennis_de_table\theme\images\favicon.png'>",
            'CustomID' => "AppGettingStartedTest"
        ]
        ]
    ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        $_SESSION['message'] = 'Email envoyé avec succès !';
        header('Location: index.php');
    }
    else{
        $_SESSION['message'] = 'Email non valide pour l\'envoie du message à l\'administrateur';
        header('Location: contact.html');
    }

} else {
    header('Location: contact.html');
    die();
}
?>

