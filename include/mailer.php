<?php 
    require 'vendor/autoload.php';
    use \Mailjet\Resources;
    $mj = new \Mailjet\Client('2263c4133db1b41687a8e4f6be8bb26f','8f73fc1c0efa9b52f6764c23d975b19c',true,['version' => 'v3.1']);


    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
                [
                  'From' => [
                    'Email' => "hosni.is@outlook.fr",
                    'Name' => "ToedGroup"
                  ],
                  'To' => [
                    [
                      'Email' => "contact@toedgroup.go.yj.fr",
                      'Name' => "ToedGroup"
                    ]
                  ],
                'Subject' => "Contact - ToedGroup",
                'TextPart' => "$email, $message", 
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
            header('Location: contact.php');
        }
        else{
            echo "Email non valide";
        }

    } else {
        
        header('Location: 404.php');
        die();
    }