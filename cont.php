



<?php 

session_start();
require_once(__DIR__ . '/vendor/autoload.php');
use \Mailjet\Resources;
define('API_PUBLIC_KEY', 'fb803bbfcdbdab6c272eda8aa4a76198');
define('API_PRIVATE_KEY', '0dcbbcb7b4b9c498d99a387e34405d24');
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
                'Email' => "lpdimtltt@gmail.com",
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

